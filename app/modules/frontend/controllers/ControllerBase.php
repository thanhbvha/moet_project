<?php
namespace Moet\Modules\Frontend\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public $_user;
	public function initialize()
    {
    	if(!$this->runPerm()){
    		return $this->response->redirect('login');
    	}
        $login = $this->isLogin();
        if($login){
            $this->view->user = $login;
            $this->_user = $login;
        }
    }

    private function runPerm(){
    	$sessID = $this->session->getId();
    	$roleName = "guest";
    	$userInfo = $this->session->has("session_users_$sessID") ? $this->session->get("session_users_$sessID") : false;
    	if($userInfo){
			$roleName = $userInfo->MoetUsersRoles->name;
		}
		$controller = $this->dispatcher->getControllerName();
		$action = $this->dispatcher->getActionName();
		$allowed = $this->acl->isAllowed($roleName, $controller, $action);
		return $allowed;
    }

    private function isLogin()
    {
        $sessID = $this->session->getId();
        if($this->session->has("session_users_$sessID")){
            return $this->session->get("session_users_$sessID");
        }
        return false;
    }
}
