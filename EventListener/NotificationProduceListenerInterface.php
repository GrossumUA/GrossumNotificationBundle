<?php

namespace GrossumUA\NotificationBundle\EventListener;

use GrossumUA\NotificationBundle\Event\NotificationEventInterface;

interface NotificationProduceListenerInterface
{
    /**
     * @param NotificationEventInterface $event
     *
     * @return void
     */
    public function produceNotifications(NotificationEventInterface $event);
}
