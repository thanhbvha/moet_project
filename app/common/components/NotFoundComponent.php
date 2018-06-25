<?php
namespace Moet\Components;

use Phalcon\Mvc\User\Plugin;

class NotFoundComponent extends Plugin{

	public function beforeException($exceptionCode){
		switch ($exceptionCode) {
    		case $this->dispatcher::EXCEPTION_HANDLER_NOT_FOUND:
            case $this->dispatcher::EXCEPTION_ACTION_NOT_FOUND:
            	$this->dispatcher->forward([
                    'controller'=>'errors',
                    'action'=>'error404'
                ]);
                return false;
            	break;
            default:
                break;
    	}
        return;
	}
}