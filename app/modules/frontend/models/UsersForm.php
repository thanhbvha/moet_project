<?php
namespace Moet\Modules\Frontend\Models;

use Moet\Models\MoetUsersRoles;
use Phalcon\Forms\Element\Email;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\PresenceOf;

class UsersForm extends Form
{
	public function initialize(){
		$this->add( new Hidden('id') );
		$this->add( new Text('username') );
		$this->add( new Text('fullname') );
		$this->add( new Password('password') );
		$this->add( new Email('email') );
		$this->add( new Text('phone') );
		$this->add( new Select('status', ['1'=>'Active', '0'=>'Inactive']) );
		$this->add( new Select('role', MoetUsersRoles::find(), ['using'=>['id','name']]) );
	}
}