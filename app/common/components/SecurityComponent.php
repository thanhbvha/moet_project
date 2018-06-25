<?php
namespace Moet\Components;

use Phalcon\Mvc\User\Plugin;

class SecurityComponent extends Plugin{

	public function runPerm($controller, $action){
		switch ($this->isLogin()) {
            case false:
                if(!$this->checkPerm($controller, $action)){
                    $this->dispatcher->forward([
                        'controller'=>'login',
                        'action'=>'index'
                    ]);
                    return false;
                }
                break;
            default:
                if(!$this->checkPerm($controller, $action)){
                    $this->dispatcher->forward([
                        'controller'=>'errors',
                        'action'=>'error401'
                    ]);
                    return false;
                }
                break;
        }
	}

	public function isLogin(){
		$sessID = $this->session->getId();
		if($this->session->has("session_users_$sessID")){
			return $this->session->get("session_users_$sessID");
		}
		return false;
	}

	private function checkPerm($controller, $action){
		$roleName = $this->getRole();
		$allowed = $this->acl->isAllowed($roleName, $controller, $action);
		return $allowed;
	}

	private function getRole(){
		$roleName = "guest";
		$userInfo = $this->isLogin();
		if($userInfo){
			$roleName = $userInfo->MoetUsersRoles->name;
		}
		return $roleName;
	}
}