<?php

namespace GrossumUA\NotificationBundle\Event;

use GrossumUA\NotificationBundle\Notification\NotificationInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class NotificationCreatedEvent
 * @package GrossumUA\NotificationBundle\Event
 */
class NotificationCreatedEvent extends Event implements NotificationEventInterface
{
    /**
     * @var NotificationInterface
     */
    private $notification;

    /**
     * NotificationCreatedEvent constructor.
     *
     * @param NotificationInterface $notification
     */
    public function __construct(NotificationInterface $notification)
    {
        $this->notification = $notification;
    }

    /**
     * @return NotificationInterface
     */
    public function getNotification(): NotificationInterface
    {
        return $this->notification;
    }
}
