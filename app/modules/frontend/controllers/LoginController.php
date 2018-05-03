<?php

namespace Moet\Modules\Frontend\Controllers;

use Moet\Library\Google;
use Moet\Models\MoetUsers;
use Moet\Modules\Frontend\Models\LoginForm;

class LoginController extends ControllerBase
{
    public function beforeExecuteRoute($dispatcher)
    {
        $sessID = $this->session->getId();
        if($this->session->has("session_users_$sessID")){
            return $this->response->redirect('/');
        }
    }

    public function indexAction()
    {
    	if($this->request->isPost()){
            $sessID = $this->session->getId();
    		if($this->security->checkToken()){
    			$username = trim($this->request->getPost('username'));
    			$password = trim($this->request->getPost('password'));

    			$userInfo =MoetUsers::findFirstByUsername($username);
                if(1 === (int) $userInfo->status){
                    if($this->security->checkHash($password, $userInfo->password)){
                        $this->session->set("session_users_$sessID", $userInfo);
                        return $this->response->redirect('/');
                    }
                }
    			$this->flash->error('Tên đăng nhập hoặc mật khẩu không đúng');
    		}
    	}

    	$this->view->setVars([
    		'form' => new LoginForm()
    	]);
    }

    public function googleAction(){
    	$sessID = $this->session->getId();
    	$config = APP_PATH . '/config/google_app_login.json';
    	$client = new Google($config);
    	if($this->session->has("token_$sessID")){
    		$client->setAccessToken($this->session->get("token_$sessID"));
			$oauthInfo = $client->Oauth2();
			$this->session->remove("token_$sessID");
			$userInfo = MoetUsers::findFirstByEmail($oauthInfo->email);
			if($userInfo){
                if(1 === (int) $userInfo->status){
    				$userInfo->fullname = $oauthInfo->name;
    				$userInfo->save();

    				$this->session->set("session_users_$sessID", $userInfo);
        			return $this->response->redirect('/');
                }else{
                    $this->flash->warning('Tài khoản đang trong quá trình chờ duyệt');
                }
			}else{
                $registerInfo = new MoetUsers();
                $registerInfo->email = $oauthInfo->email;
                $registerInfo->fullname = $oauthInfo->name;
                $registerInfo->role = 2;
                $registerInfo->status = 0;
                $registerInfo->save();
                $this->flash->success('Đăng ký tài khoản thành công');
            }
			return $this->response->redirect('login');
    	}
    	return $this->response->redirect('login/ggoauth');
    }

    public function ggoauthAction(){
    	$sessID	=	$this->session->getId();
		$config = APP_PATH . '/config/google_app_login.json';
        $host = $_SERVER['HTTP_HOST'];
        $baseUri = $this->config->application->baseUri;
		$redirectUri = "http://".$host.$baseUri."login/ggoauth";
		$client = new Google($config, $redirectUri);

		if (!$this->request->has('code')){
			$auth_url = $client->createAuthUrl();
			return $this->response->redirect($auth_url);
		}
		
		$client->authenticate($this->request->get('code'));
		$this->session->set("token_$sessID", $client->getAccessToken());
		return $this->response->redirect('login/google');
	}

    public function logoutAction()
    {
    	$this->session->destroy();
    	$this->response->redirect('/');
    }

}

