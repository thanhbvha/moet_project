<?php

namespace Moet\Models;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

class MoetUsersInfo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $units_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $address;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=true)
     */
    public $phone;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $unit_manager;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $noted;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $creator_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $created_at;

    /**
     * set created_at beforeCreate
     */    
    public function beforeCreate()
    {
        $this->created_at = time();
    }

    /**
     * write log if create success | afterCreate
     */    
    public function afterCreate()
    {
        $log = [
            'title' => "{$this->MoetUsers->email} create user infomation",
            'message' => "{$this->MoetUsers->email} create user infomation success",
            'creator_id' => $this->creator_id
        ];
        $this->getDi()['userlog']->logTask($log);
    }
    /**
     * write log if update success | afterCreate
     */    
    public function afterUpdate()
    {
        $log = [
            'title' => "{$this->MoetUsers->email} update user infomation",
            'message' => "{$this->MoetUsers->email} update user infomation success",
            'creator_id' => $this->creator_id
        ];
        $this->getDi()['userlog']->logTask($log);
    }

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    /*public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new EmailValidator(
                [
                    'model'   => $this,
                    'message' => 'Please enter a correct email address',
                ]
            )
        );

        return $this->validate($validator);
    }*/

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema($this->getDi()['config']->database->dbname);
        $this->setSource("moet_users_info");
        $this->belongsTo('units_id', 'Moet\Models\\MoetUnits', 'id', ['alias' => 'MoetUnits']);
        $this->belongsTo('creator_id', 'Moet\Models\\MoetUsers', 'id', ['alias' => 'MoetUsers']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'moet_users_info';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MoetUsersInfo[]|MoetUsersInfo|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MoetUsersInfo|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
