<?php
namespace Moet\Modules\Frontend\Models;

use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;

class UnitsForm extends Form
{
	public function initialize(){
		$this->add( new Hidden('id') );
		$this->add( new Text('name') );
	}
}