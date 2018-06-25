<?php
namespace Moet\Modules\Frontend\Controllers;

use Moet\Components\SecurityComponent;
use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public $_user;

	public function initialize()
    {
        $secuComponent = new SecurityComponent();
        $this->_user = $secuComponent->isLogin();
        if($this->_user){
            $this->view->user = $secuComponent->isLogin();
        }
    }
}
