<?php
namespace Moet\Components;

use Moet\Models\MoetUsersActivity;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;

/**
* Doing write log event
*/
class UsersLogEvent extends Plugin
{
	public function afterActionDB(Event $event, $component)
	{
		$log = new MoetUsersActivity();
		$log->title = $component->_data['title'];
		$log->message = $component->_data['message'];
		$log->creator_id = $component->_data['creator_id'];
		$log->save();
	}
}