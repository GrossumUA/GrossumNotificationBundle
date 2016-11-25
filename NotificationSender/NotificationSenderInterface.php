<?php

namespace GrossumUA\NotificationBundle\NotificationSender;

use GrossumUA\NotificationBundle\Notification\NotificationInterface;

interface NotificationSenderInterface
{
    /**
     * @param NotificationInterface $notification
     */
    public function sendNotification(NotificationInterface $notification);
}
