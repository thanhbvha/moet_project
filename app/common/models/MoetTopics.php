<?php

namespace Moet\Models;

class MoetTopics extends \Phalcon\Mvc\Model
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
     * @var string
     * @Column(type="string", length=20, nullable=true)
     */
    public $code;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $units_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $fields_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    public $specialize_id;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $student_info;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $instructor;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $science_topic;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $unit_manager;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $expected_council;

    /**
     *
     * @var double
     * @Column(type="double", length=2, nullable=true)
     */
    public $council_point;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    public $expected_award;

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
            'title' => "Create new topic [{$this->id}][{$this->name}]",
            'message' => "Create new topic [{$this->id}][{$this->name}] success",
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
            'title' => "Update topic [{$this->id}][{$this->name}]",
            'message' => "Update topic [{$this->id}][{$this->name}] success",
            'creator_id' => $this->creator_id
        ];
        $this->getDi()['userlog']->logTask($log);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("project_moet");
        $this->setSource("moet_topics");
        $this->belongsTo('units_id', 'Moet\Models\\MoetUnits', 'id', ['alias' => 'MoetUnits']);
        $this->belongsTo('fields_id', 'Moet\Models\\MoetFields', 'id', ['alias' => 'MoetFields']);
        $this->belongsTo('specialize_id', 'Moet\Models\\MoetUnitsSpecialize', 'id', ['alias' => 'MoetUnitsSpecialize']);
        $this->belongsTo('creator_id', 'Moet\Models\\MoetUsers', 'id', ['alias' => 'MoetUsers']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'moet_topics';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MoetTopics[]|MoetTopics|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MoetTopics|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
