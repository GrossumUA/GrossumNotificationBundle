<?php

namespace GrossumUA\NotificationBundle\Notification;

/**
 * Class EntityDataUpdateNotification
 * @package GrossumUA\NotificationBundle\Notification
 */
class EntityDataUpdateNotification implements NotificationInterface
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $entityName;

    /**
     * @var array
     */
    private $entityData = [];

    /**
     * @var array
     */
    private $recipientHashes = [];

    /**
     * @var bool
     */
    private $global;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->global = false;
        $this->type = NotificationInterface::SOCKET_NOTIFICATION_TYPE_ENTITY_UPDATE;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getEntityName(): string
    {
        return $this->entityName;
    }

    /**
     * @param string $entityName
     *
     * @return $this
     */
    public function setEntityName(string $entityName)
    {
        $this->entityName = $entityName;

        return $this;
    }

    /**
     * @return array
     */
    public function getEntityData(): array
    {
        return $this->entityData;
    }

    /**
     * @param array $entityData
     *
     * @return $this
     */
    public function setEntityData(array $entityData)
    {
        $this->entityData = $entityData;

        return $this;
    }

    /**
     * @return array
     */
    public function getRecipientHashes(): array
    {
        return $this->recipientHashes;
    }

    /**
     * @param array $recipientHashes
     *
     * @return $this
     */
    public function setRecipientHashes(array $recipientHashes)
    {
        $this->recipientHashes = $recipientHashes;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isGlobal(): bool
    {
        return $this->global;
    }

    /**
     * @param bool $global
     *
     * @return $this
     */
    public function setGlobal(bool $global)
    {
        $this->global = $global;

        return $this;
    }

    /**
     * @return array
     */
    public function exportData()
    {
        return [
            'type'       => $this->getType(),
            'attributes' => [
                'recipients' => $this->getRecipientHashes(),
                'entityName' => $this->getEntityName(),
                'entityData' => $this->getEntityData(),
                'global'     => $this->isGlobal(),
            ],
        ];
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return true;
    }
}
