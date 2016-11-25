<?php

namespace GrossumUA\NotificationBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use GrossumUA\NotificationBundle\Notification\NotificationInterface;

class NotificationCreatedEvent extends Event implements NotificationEventInterface
{
    /**
     * @var NotificationInterface
     */
    private $notification;

    /**
     * @param NotificationInterface $notification
     */
    public function __construct(NotificationInterface $notification)
    {
        $this->notification = $notification;
    }

    /**
     * {@inheritdoc}
     */
    public function getNotification(): NotificationInterface
    {
        return $this->notification;
    }
}
