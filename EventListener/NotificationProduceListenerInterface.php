<?php

namespace GrossumUA\NotificationBundle\EventListener;

use GrossumUA\NotificationBundle\Event\NotificationEventInterface;

/**
 * Interface NotificationProduceListenerInterface
 * @package GrossumUA\NotificationBundle\EventListener
 */
interface NotificationProduceListenerInterface
{
    /**
     * @param NotificationEventInterface $event
     *
     * @return void
     */
    public function produceNotifications(NotificationEventInterface $event);
}