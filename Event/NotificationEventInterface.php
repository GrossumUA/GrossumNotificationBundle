<?php

namespace GrossumUA\NotificationBundle\Event;

use GrossumUA\NotificationBundle\Notification\NotificationInterface;

interface NotificationEventInterface
{
    /**
     * @return NotificationInterface
     */
    public function getNotification(): NotificationInterface;
}
