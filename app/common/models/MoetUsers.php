<?php

namespace Moet\Models;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

class MoetUsers extends \Phalcon\Mvc\Model
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
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $username;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $password;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $fullname;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $email;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $phone;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $role;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $status;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $created_at;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $updated_at;

    /**
     * set created_at beforeCreate
     */    
    public function beforeCreate()
    {
        $this->created_at = time();
    }

    /**
     * set updated_at beforeUpdate
     */    
    public function beforeUpdate()
    {
      $this->updated_at = time();
    }

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
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
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("project_moet");
        $this->setSource("moet_users");
        $this->hasMany('id', 'Moet\Models\MoetFields', 'creator_id', ['alias' => 'MoetFields']);
        $this->hasMany('id', 'Moet\Models\MoetTopics', 'creator_id', ['alias' => 'MoetTopics']);
        $this->hasMany('id', 'Moet\Models\MoetUnits', 'creator_id', ['alias' => 'MoetUnits']);
        $this->hasMany('id', 'Moet\Models\MoetUnitsSpecialize', 'creator_id', ['alias' => 'MoetUnitsSpecialize']);
        $this->belongsTo('role', 'Moet\Models\\MoetUsersRoles', 'id', ['alias' => 'MoetUsersRoles']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'moet_users';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MoetUsers[]|MoetUsers|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MoetUsers|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
    
    /**
    * Update + insert user info
    */
    public function createOrUpdate($requestData=[])
    {
        $this->username = $requestData['username'];
        $this->fullname = $requestData['fullname'];
        $this->email = $requestData['email'];
        $this->phone = $requestData['phone'];
        $this->status = $requestData['status'];
        $this->role = $requestData['role'];
        return $this->save();
    }
}
