<?php

namespace GrossumUA\NotificationBundle\Notification;

/**
 * Class EntityDataDeleteNotification
 * @package GrossumUA\NotificationBundle\Notification
 */
class EntityDataDeleteNotification implements NotificationInterface
{
    /**
     * @var int
     */
    private $entityId;

    /**
     * @var string
     */
    private $entityName;

    /**
     * @var string
     */
    private $type;

    /**
     * @var []
     */
    private $recipientHashes;

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
        $this->type = NotificationInterface::SOCKET_NOTIFICATION_TYPE_ENTITY_DELETE;
    }

    /**
     * @return int
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

    /**
     * @param int $entityId
     *
     * @return $this
     */
    public function setEntityId(int $entityId)
    {
        $this->entityId = $entityId;

        return $this;
    }

    /**
     * @return string
     */
    public function getEntityName()
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
     * @return string
     */
    public function getType()
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
    public function isGlobal()
    {
        return $this->global;
    }

    /**
     * @param bool $global
     */
    public function setGlobal(bool $global)
    {
        $this->global = $global;
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
                'entityId'   => $this->getEntityId(),
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
