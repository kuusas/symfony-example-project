<?php

namespace NotificationBundle\EventListener;

use TaskBundle\Event\TaskCreated;

class EmailNotificationsEventListener
{
    public function onTaskCreated(TaskCreated $event)
    {
        $task = $event->getTask();
        $email = $task->getCreator()->getEmail();
        
        // $this->pushNotificationService->push('Task created', $email);
    }

}
