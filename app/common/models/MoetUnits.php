<?php

namespace Moet\Models;

class MoetUnits extends \Phalcon\Mvc\Model
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
     * @Column(type="integer", length=10, nullable=true)
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
            'title' => "Create new unit [{$this->id}][{$this->name}]",
            'message' => "Create new unit [{$this->id}][{$this->name}] success",
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
            'title' => "Update unit [{$this->id}][{$this->name}]",
            'message' => "Update unit [{$this->id}][{$this->name}] success",
            'creator_id' => $this->creator_id
        ];
        $this->getDi()['userlog']->logTask($log);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema($this->getDi()['config']->database->dbname);
        $this->setSource("moet_units");
        $this->belongsTo('creator_id', 'Moet\\Models\\MoetUsers', 'id', ['alias' => 'MoetUsers']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'moet_units';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MoetUnits[]|MoetUnits|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MoetUnits|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
