<?php

namespace GrossumUA\NotificationBundle\Notification;

use GrossumUA\NotificationBundle\Exception\PropertyNotFountException;

class PushNotification implements NotificationInterface
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $body;

    /**
     * @var string
     */
    private $icon;

    /**
     * @var string
     */
    private $osType;

    /**
     * @var array
     */
    private $registrationTokens = [];

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     *
     * @return $this
     */
    public function setBody(string $body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     *
     * @return $this
     */
    public function setIcon(string $icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return string
     */
    public function getOsType()
    {
        return $this->osType;
    }

    /**
     * @param string $osType
     *
     * @return $this
     */
    public function setOsType(string $osType)
    {
        $this->osType = $osType;

        return $this;
    }

    /**
     * @return array
     */
    public function getRegistrationTokens(): array
    {
        return $this->registrationTokens;
    }

    /**
     * @param array $registrationTokens
     */
    public function setRegistrationTokens(array $registrationTokens)
    {
        $this->registrationTokens = $registrationTokens;
    }

    /**
     * @return array
     */
    public function exportData()
    {
        return [
            'title'              => $this->getTitle(),
            'body'               => $this->getBody(),
            'icon'               => $this->getIcon(),
            'os_type'            => $this->getOsType(),
            'registrationTokens' => $this->getRegistrationTokens(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function isValid()
    {
        $properties = [
            'title'              => $this->getTitle(),
            'body'               => $this->getBody(),
            'icon'               => $this->getIcon(),
            'osType'             => $this->getOsType(),
            'registrationTokens' => $this->getRegistrationTokens(),
        ];

        foreach ($properties as $propertyKey => $propertyValue) {
            if (empty($propertyValue)) {
                throw new PropertyNotFountException(sprintf('Property %s is not set', $propertyKey));
            }
        }

        return true;
    }
}
