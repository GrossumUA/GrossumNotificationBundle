<?php

namespace GrossumUA\NotificationBundle\NotificationSender;

use GrossumUA\NotificationBundle\Notification\NotificationInterface;

/**
 * Interface NotificationSenderInterface
 * @package GrossumUA\NotificationBundle\NotificationSender
 */
interface NotificationSenderInterface
{
    /**
     * @param NotificationInterface $notification
     */
    public function sendNotification(NotificationInterface $notification);
}
