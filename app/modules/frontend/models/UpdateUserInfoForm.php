<?php
namespace Moet\Modules\Frontend\Models;

use Moet\Models\MoetUnits;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\PresenceOf;

class UpdateUserInfoForm extends Form
{
	public function initialize(){
		$this->add( new Hidden('id') );
		$this->add(new Select('units_id',MoetUnits::find(),['using'=>['id','name']]));
		$this->add( new Text('address') );
		$this->add( new Text('phone') );
		$this->add( new Text('unit_manager') );
		$this->add( new TextArea('noted') );
	}
}