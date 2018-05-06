<?php
namespace Moet\Modules\Frontend\Models;

use Moet\Models\MoetFields;
use Moet\Models\MoetUnits;
use Moet\Models\MoetUnitsSpecialize;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\PresenceOf;

class TopicForm extends Form
{
	public function initialize($entity, $userOptions){
		$this->add(new Select('units_id',MoetUnits::find(),['using'=>['id','name']]));

		$fields = MoetFields::find();
		$this->add(new Select('fields_id',$fields,['using'=>['id','name']]));

		$fields_arr = $fields->toArray();
		$defaultField = array_shift($fields_arr);
		$specialize = MoetUnitsSpecialize::findByFields_id(isset($userOptions['fields_id'])?$userOptions['fields_id']:$defaultField['id']);
		if(count($specialize)===0) $specialize = [''=>'Chọn chuyên ngành'];
		$this->add(
			(new Select('specialize_id',$specialize,['using'=>['id','name']]))
		);

		$this->add( new Text('topicCode') );
		$this->add( new Text('topicName') );

		$this->add( new Text('student') );

		$this->add( new Select('studentSex',['male' => 'Nam','female' => 'Nữ']));

		$this->add( new Text('studentGenus') );
		$this->add( new Text('studentScholastic') );
		$this->add( new Text('studentSpecialize') );
		$this->add( new TextArea('studentContact') );

		$this->add( new Text('instructor') );
		$this->add( new TextArea('scienceTopic') );
		$this->add( new Text('unitManager') );
		$this->add( new Text('expectedCouncil') ); // du kien hoi dong vong so khao
		$this->add( new Text('councilPoint ') ); // diem hoi dong so khao
		$this->add( new Text('expectedAward') ); // du kien xep giai
		$this->add( new TextArea('noted') );
	}
}