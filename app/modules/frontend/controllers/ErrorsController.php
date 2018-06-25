<?php

namespace Moet\Modules\Frontend\Controllers;

class ErrorsController extends ControllerBase
{
	public function initialize()
    {
        parent::initialize();
        $this->view->setMainView("errors");
    }

    public function indexAction(){}

    public function error401Action(){}

    public function error404Action(){}

}

