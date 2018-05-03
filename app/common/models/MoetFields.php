<?php

namespace Moet\Models;

class MoetFields extends \Phalcon\Mvc\Model
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
    public $name;

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
     * write log if create success | afterCreate
     */    
    public function afterCreate()
    {
        $log = [
            'title' => "Create new field [{$this->id}][{$this->name}]",
            'message' => "Create new field [{$this->id}][{$this->name}] success",
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
            'title' => "Update field [{$this->id}][{$this->name}]",
            'message' => "Update field [{$this->id}][{$this->name}] success",
            'creator_id' => $this->creator_id
        ];
        $this->getDi()['userlog']->logTask($log);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("qlkh");
        $this->setSource("moet_fields");
        $this->belongsTo('creator_id', 'Moet\\Models\\MoetUsers', 'id', ['alias' => 'MoetUsers']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'moet_fields';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MoetFields[]|MoetFields|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MoetFields|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
