<?php
namespace Moet\Components;

use Phalcon\Events\ManagerInterface;
use Phalcon\Events\EventsAwareInterface;
/**
* Loging user activity
*/
class UserActivityLogComponent implements EventsAwareInterface
{
	
	protected $_eventsManager;

    public function setEventsManager(ManagerInterface $eventsManager)
    {
        $this->_eventsManager = $eventsManager;
    }

    public function getEventsManager()
    {
        return $this->_eventsManager;
    }

    public function logTask($data)
    {
        $this->_data = $data;
        $this->_eventsManager->fire("userlog:afterActionDB", $this);
    }
}