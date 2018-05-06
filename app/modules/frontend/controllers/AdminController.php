<?php

namespace Moet\Modules\Frontend\Controllers;

use Moet\Models\MoetFields;
use Moet\Models\MoetTopics;
use Moet\Models\MoetUnits;
use Moet\Models\MoetUnitsSpecialize;
use Moet\Models\MoetUsers;
use Moet\Models\MoetUsersActivity;
use Moet\Modules\Frontend\Models\FieldsForm;
use Moet\Modules\Frontend\Models\UnitsForm;
use Moet\Modules\Frontend\Models\UnitsSpecializeForm;
use Moet\Modules\Frontend\Models\UsersForm;

class AdminController extends ControllerBase
{
    public function indexAction()
    {
    	$allUsers = MoetUsers::find();

    	$this->view->setVars([
    		'allUsers' => $allUsers
    	]);
    }

    public function topicAction()
    {
        $data = MoetTopics::find();

        $this->view->setVars([
            'topics' => $data
        ]);
    }

    public function unitsAction()
    {
		$data = MoetUnits::find();
        $this->view->setVars([
            'units' => $data
        ]);
        $this->view->render('admin', 'units');
    }

    public function fieldsAction()
    {
        $data = MoetFields::find();

        $this->view->setVars([
            'fields' => $data
        ]);
    }

    public function specializeAction()
    {
        $data = MoetUnitsSpecialize::find();

        $this->view->setVars([
            'unitSpecialize' => $data
        ]);
    }

    public function loggingAction()
    {
        $data = MoetUsersActivity::find();
        $this->view->setVars([
            'logging' => $data
        ]);
    }

    // users form
    public function usersAction($action=null)
    {
    	$id = $this->request->has('id') ? $this->request->get('id') : ( $this->request->hasPost('id') ? $this->request->getPost('id') : false );
    	switch ($action) {
    		case 'create':
    			if($this->request->isPost()){
					$dataPost = $this->request->getPost();
					(new MoetUsers())->createOrUpdate($dataPost);
					return $this->response->redirect('admin');
				}
				$this->view->setVars([
					'isNewRecord' => true,
					'form' => new UsersForm()
				]);
				return $this->view->partial('admin/_users_form');
    			break;
    		case 'update':
    			if($id !== false){
    				$user = MoetUsers::findFirstById($id);
    				if($user){
	    				if($this->request->isPost()){
	    					$dataPost = $this->request->getPost();
	    					$user->createOrUpdate($dataPost);
	    					return $this->response->redirect('admin');
	    				}
	    				$this->view->setVars([
	    					'form' => new UsersForm($user)
	    				]);
	    				return $this->view->partial('admin/_users_form');
	    			}
    			}
    			break;
    		case 'delete':
    			if($id !== false){
    				$user = MoetUsers::findFirstById($id);
    				if($user){
    					$user->delete();
    				}
    			}
    			break;
    	}
    	return $this->response->redirect('admin');
    }
    //units form
    public function unitsFormAction($action)
    {
    	$id = $this->request->has('id') ? $this->request->get('id') : ( $this->request->hasPost('id') ? $this->request->getPost('id') : false );
    	switch ($action) {
    		case 'create':
    			if($this->request->isPost()){
					$dataPost = $this->request->getPost();
					$unit = new MoetUnits();
					$unit->name = $dataPost['name'];
					$unit->creator_id = $this->_user->id;
					$unit->save();
					return $this->response->redirect('admin/units');
				}
				$this->view->setVars([
					'isNewRecord' => true,
					'form' => new UnitsForm()
				]);
				return $this->view->partial('admin/units_form');
    			break;
    		case 'update':
    			if($id !== false){
    				$unit = MoetUnits::findFirstById($id);
    				if($unit){
	    				if($this->request->isPost()){
	    					$dataPost = $this->request->getPost();
	    					$unit->name = $dataPost['name'];
	    					$unit->creator_id = $this->_user->id;
							$unit->save();
	    					return $this->response->redirect('admin/units');
	    				}
	    				$this->view->setVars([
	    					'form' => new UnitsForm($unit)
	    				]);
	    				return $this->view->partial('admin/units_form');
	    			}
    			}
    			break;
    		case 'delete':
    			if($id !== false){
    				$unit = MoetUnits::findFirstById($id);
    				if($unit){
    					$unit->delete();
    				}
    			}
    			break;
    	}
    	return $this->response->redirect('admin/units');
    }
    // fields form
    public function fieldsFormAction($action)
    {
    	$id = $this->request->has('id') ? $this->request->get('id') : ( $this->request->hasPost('id') ? $this->request->getPost('id') : false );
    	switch ($action) {
    		case 'create':
    			if($this->request->isPost()){
					$dataPost = $this->request->getPost();
					$fields = new MoetFields();
                    $fields->code = $dataPost['code'];
					$fields->name = $dataPost['name'];
					$fields->creator_id = $this->_user->id;
					$fields->save();
					return $this->response->redirect('admin/fields');
				}
				$this->view->setVars([
					'isNewRecord' => true,
					'form' => new FieldsForm()
				]);
				return $this->view->partial('admin/fields_form');
    			break;
    		case 'update':
    			if($id !== false){
    				$fields = MoetFields::findFirstById($id);
    				if($fields){
	    				if($this->request->isPost()){
	    					$dataPost = $this->request->getPost();
                            $fields->code = $dataPost['code'];
	    					$fields->name = $dataPost['name'];
	    					$fields->creator_id = $this->_user->id;
							$fields->save();
	    					return $this->response->redirect('admin/fields');
	    				}
	    				$this->view->setVars([
	    					'form' => new FieldsForm($fields)
	    				]);
	    				return $this->view->partial('admin/fields_form');
	    			}
    			}
    			break;
    		case 'delete':
    			if($id !== false){
    				$fields = MoetFields::findFirstById($id);
    				if($fields){
    					$fields->delete();
    				}
    			}
    			break;
    	}
    	return $this->response->redirect('admin/fields');
    }
    // specialize form
    public function specializeFormAction($action)
    {
    	$id = $this->request->has('id') ? $this->request->get('id') : ( $this->request->hasPost('id') ? $this->request->getPost('id') : false );
    	switch ($action) {
    		case 'create':
    			if($this->request->isPost()){
					$dataPost = $this->request->getPost();
					$moetUnitsSpecialize = new MoetUnitsSpecialize();
                    $moetUnitsSpecialize->code = $dataPost['code'];
                    $moetUnitsSpecialize->fields_id = $dataPost['fields_id'];
					$moetUnitsSpecialize->name = $dataPost['name'];
					$moetUnitsSpecialize->creator_id = $this->_user->id;
					$moetUnitsSpecialize->save();
					return $this->response->redirect('admin/specialize');
				}
				$this->view->setVars([
					'isNewRecord' => true,
					'form' => new UnitsSpecializeForm()
				]);
				return $this->view->partial('admin/specialize_form');
    			break;
    		case 'update':
    			if($id !== false){
    				$moetUnitsSpecialize = MoetUnitsSpecialize::findFirstById($id);
    				if($moetUnitsSpecialize){
	    				if($this->request->isPost()){
	    					$dataPost = $this->request->getPost();
                            $moetUnitsSpecialize->code = $dataPost['code'];
                            $moetUnitsSpecialize->fields_id = $dataPost['fields_id'];
	    					$moetUnitsSpecialize->name = $dataPost['name'];
	    					$moetUnitsSpecialize->creator_id = $this->_user->id;
							$moetUnitsSpecialize->save();
	    					return $this->response->redirect('admin/specialize');
	    				}
	    				$this->view->setVars([
	    					'form' => new UnitsSpecializeForm($moetUnitsSpecialize)
	    				]);
	    				return $this->view->partial('admin/specialize_form');
	    			}
    			}
    			break;
    		case 'delete':
    			if($id !== false){
    				$moetUnitsSpecialize = MoetUnitsSpecialize::findFirstById($id);
    				if($moetUnitsSpecialize){
    					$moetUnitsSpecialize->delete();
    				}
    			}
    			break;
    	}
    	return $this->response->redirect('admin/specialize');
    }
}

