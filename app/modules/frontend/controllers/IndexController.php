<?php

namespace Moet\Modules\Frontend\Controllers;

use Moet\Models\MoetUsersInfo;
use Moet\Modules\Frontend\Models\UpdateUserInfoForm;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	if($this->request->isPost()){
    		if($this->security->checkToken() && 0 === (int)$this->_user->is_update) {
    			$userInfo = new MoetUsersInfo();
    			$dataPost = $this->request->getPost();
    			$userInfo->units_id = $dataPost['units_id'];
    			$userInfo->address = $dataPost['address'];
    			$userInfo->phone = $dataPost['phone'];
    			$userInfo->unit_manager = $dataPost['unit_manager'];
    			$userInfo->noted = $dataPost['noted'];
    			$userInfo->creator_id = $this->_user->id;
    			if($userInfo->save()){
    				$this->_user->is_update = 1;
    				$this->_user->save();
    				return $this->response->redirect('/');
    			}else{
    				$messages = $userInfo->getMessages();
                    foreach ($messages as $message) {
                        $this->flash->error($message);
                    }
    			}
    		}
    	}
		$this->view->setVars([
    		'form' => new UpdateUserInfoForm()
    	]);
    }

}

