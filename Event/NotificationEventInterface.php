<?php

namespace GrossumUA\NotificationBundle\Event;

use GrossumUA\NotificationBundle\Notification\NotificationInterface;

/**
 * Interface NotificationEventInterface
 * @package GrossumUA\NotificationBundle\Event
 */
interface NotificationEventInterface
{

    /**
     * @return NotificationInterface
     */
    public function getNotification(): NotificationInterface;
}
