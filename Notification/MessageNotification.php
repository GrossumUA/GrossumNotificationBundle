<?php

namespace GrossumUA\NotificationBundle\Notification;

use GrossumUA\NotificationBundle\Exception\PropertyNotFountException;

/**
 * Class MessageNotification
 * @package GrossumUA\NotificationBundle\Notification
 */
class MessageNotification implements NotificationInterface
{
    /**
     * @var bool
     */
    private $global;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $mediaUrl;

    /**
     * @var string
     */
    private $renderedContent;

    /**
     * @var []
     */
    private $recipientHashes;

    /**
     * @var \DateTime
     */
    private $createdAt;

    public function __construct()
    {
        $this->global = false;
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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return $this
     */
    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string
     */
    public function getMediaUrl()
    {
        return $this->mediaUrl;
    }

    /**
     * @param string $mediaUrl
     *
     * @return $this
     */
    public function setMediaUrl(string $mediaUrl)
    {
        $this->mediaUrl = $mediaUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getRenderedContent()
    {
        return $this->renderedContent;
    }

    /**
     * @param string $renderedContent
     *
     * @return $this
     */
    public function setRenderedContent(string $renderedContent)
    {
        $this->renderedContent = $renderedContent;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRecipientHashes()
    {
        return $this->recipientHashes;
    }

    /**
     * @return boolean
     */
    public function isGlobal(): bool
    {
        return $this->global;
    }

    /**
     * @param boolean $global
     */
    public function setGlobal(bool $global)
    {
        $this->global = $global;
    }

    /**
     * @param mixed $recipientHashes
     */
    public function setRecipientHashes($recipientHashes)
    {
        $this->recipientHashes = $recipientHashes;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     *
     * @return $this
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

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
                'recipients'      => $this->getRecipientHashes(),
                'global'          => $this->isGlobal(),
                'title'           => $this->getTitle(),
                'content'         => $this->getContent(),
                'mediaUrl'        => $this->getMediaUrl(),
                'renderedContent' => $this->getRenderedContent(),
                'createdAt'       => $this->getCreatedAt(),
            ],
        ];
    }

    /**
     * @return bool
     * @throws PropertyNotFountException
     */
    public function isValid()
    {
        if (!$this->isGlobal() && empty($this->getRecipientHashes())) {
            throw new PropertyNotFountException('Property global or recipientHashes is not set');
        }

        if (empty($this->getRenderedContent()) && empty($this->getContent())) {
            throw new PropertyNotFountException('Property renderedContent or content is not set');
        }

        return true;
    }
}
