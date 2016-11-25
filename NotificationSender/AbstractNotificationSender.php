<?php

namespace GrossumUA\NotificationBundle\NotificationSender;

use GrossumUA\NotificationBundle\Notification\NotificationInterface;
use OldSound\RabbitMqBundle\RabbitMq\ProducerInterface;

abstract class AbstractNotificationSender implements NotificationSenderInterface
{
    /** @var ProducerInterface $producer */
    private $producer;

    /**
     * @param ProducerInterface $producer
     */
    public function __construct(ProducerInterface $producer)
    {
        $this->producer = $producer;
    }

    /**
     * {@inheritdoc}
     */
    public function sendNotification(NotificationInterface $message)
    {
        try {
            if ($message->isValid()) {
                $this->producer->publish(json_encode($message->exportData()));
            }
        } catch (\Exception $e) {
            //TODO: add logging
        }
    }
}
