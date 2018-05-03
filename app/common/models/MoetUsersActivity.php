<?php

namespace Moet\Models;

class MoetUsersActivity extends \Phalcon\Mvc\Model
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
    public $title;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $message;

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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("qlkh");
        $this->setSource("moet_users_activity");
        $this->belongsTo('creator_id', 'Moet\Models\\MoetUsers', 'id', ['alias' => 'MoetUsers']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'moet_users_activity';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MoetUsersActivity[]|MoetUsersActivity|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MoetUsersActivity|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function saveLogActivity($data)
    {
        $this->title = $data['title'];
        $this->message = $data['message'];
        $this->creator_id = $data['creator_id'];
        $this->save();
    }
}
