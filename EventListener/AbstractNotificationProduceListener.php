<?php

namespace GrossumUA\NotificationBundle\EventListener;

use GrossumUA\NotificationBundle\Event\NotificationEventInterface;
use GrossumUA\NotificationBundle\NotificationSender\NotificationSenderInterface;

abstract class AbstractNotificationProduceListener implements NotificationProduceListenerInterface
{
    /**
     * @var NotificationSenderInterface
     */
    protected $notificationSender;

    /**
     * @param NotificationSenderInterface $notificationSender
     */
    public function __construct(NotificationSenderInterface $notificationSender)
    {
        $this->notificationSender = $notificationSender;
    }

    /**
     * @param NotificationEventInterface $event
     */
    public function produceNotifications(NotificationEventInterface $event)
    {
       $this->notificationSender->sendNotification($event->getNotification());
    }
}
