<?php
namespace Moet\Modules\Frontend\Models;

use Moet\Models\MoetFields;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;

class UnitsSpecializeForm extends Form
{

	public function initialize(){
		$this->add( new Hidden('id') );
		$this->add( new Text('code') );
		$this->add( new Text('name') );
		$this->add(new Select('fields_id',MoetFields::find(),['using'=>['id','name']]));
	}
}