<?php

namespace GrossumUA\NotificationBundle\Notification;

use GrossumUA\NotificationBundle\Exception\PropertyNotFountException;

/**
 * Class SmsNotification
 * @package GrossumUA\NotificationBundle\Notification
 */
class SmsNotification implements NotificationInterface
{
    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $phone;

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     *
     * @return $this
     */
    public function setMessage(string $message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param String $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return array
     */
    public function exportData()
    {
        return [
            'message' => $this->getMessage(),
            'phone'   => $this->getPhone(),
        ];
    }

    /**
     * {@Inheritdoc}
     */
    public function isValid()
    {
        $properties = [
            'message' => $this->getMessage(),
            'phone'   => $this->getPhone(),
        ];

        foreach ($properties as $propertyKey => $propertyValue) {
            if (empty($propertyValue)) {
                throw new PropertyNotFountException('Property ' . $propertyKey . ' is not set');
            }
        }

        return true;
    }
}
