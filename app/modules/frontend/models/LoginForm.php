<?php
namespace Moet\Modules\Frontend\Models;

use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\PresenceOf;

class LoginForm extends Form
{

	public function initialize(){
		$this->add( new Text('username') );
		$this->add( new Password('password') );
	}
}