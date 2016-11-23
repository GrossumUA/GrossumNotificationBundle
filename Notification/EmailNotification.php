<?php

namespace GrossumUA\NotificationBundle\Notification;

use GrossumUA\NotificationBundle\Exception\PropertyNotFountException;

/**
 * Class EmailNotification
 * @package GrossumUA\NotificationBundle\Notification
 */
class EmailNotification implements NotificationInterface
{
    /**
     * @var string
     */
    private $html;

    /**
     * @var string
     */
    private $plainText;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $fromEmail;

    /**
     * @var string
     */
    private $fromName;

    /**
     * @var string
     */
    private $toEmail;

    /**
     * @var string
     */
    private $toName;

    /**
     * @var string
     */
    private $toType = 'to';

    /**
     * @var string
     */
    private $replyTo;

    /**
     * @var array
     */
    private $headers = [];

    /**
     * @return string
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @param string $html
     *
     * @return $this
     */
    public function setHtml(string $html)
    {
        $this->html = $html;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlainText()
    {
        return $this->plainText;
    }

    /**
     * @param string $plainText
     *
     * @return $this
     */
    public function setPlainText(string $plainText)
    {
        $this->plainText = $plainText;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     *
     * @return $this
     */
    public function setSubject(string $subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromEmail()
    {
        return $this->fromEmail;
    }

    /**
     * @param string $fromEmail
     *
     * @return $this
     */
    public function setFromEmail(string $fromEmail)
    {
        $this->fromEmail = $fromEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromName()
    {
        return $this->fromName;
    }

    /**
     * @param string $fromName
     *
     * @return $this
     */
    public function setFromName(string $fromName)
    {
        $this->fromName = $fromName;

        return $this;
    }

    /**
     * @return string
     */
    public function getToEmail()
    {
        return $this->toEmail;
    }

    /**
     * @param string $toEmail
     *
     * @return $this
     */
    public function setToEmail(string $toEmail)
    {
        $this->toEmail = $toEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getToName()
    {
        return $this->toName;
    }

    /**
     * @param string $toName
     *
     * @return $this
     */
    public function setToName(string $toName)
    {
        $this->toName = $toName;

        return $this;
    }

    /**
     * @return string
     */
    public function getToType()
    {
        return $this->toType;
    }

    /**
     * @param string $toType
     *
     * @return $this
     */
    public function setToType(string $toType)
    {
        $this->toType = $toType;

        return $this;
    }

    /**
     * @return string
     */
    public function getReplyTo()
    {
        return $this->replyTo;
    }

    /**
     * @param string $replyTo
     *
     * @return $this
     */
    public function setReplyTo(string $replyTo)
    {
        $this->replyTo = $replyTo;
        $this->headers['replyTo'] = $replyTo;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param string $key
     * @param        $value
     *
     * @return $this
     */
    public function addHeader(string $key, $value)
    {
        $this->headers[$key] = $value;

        return $this;
    }

    /**
     * {@Inheritdoc}
     */
    public function exportData()
    {
        return [
            'html'      => $this->getHtml(),
            'plainText' => $this->getPlainText(),
            'subject'   => $this->getSubject(),
            'from'      => [
                'email' => $this->getFromEmail(),
                'name'  => $this->getFromName(),
            ],
            'to'        => [
                'email' => $this->getToEmail(),
                'name'  => $this->getToName(),
                'type'  => $this->getToType(),
            ],
            'headers'   => $this->getHeaders(),
        ];
    }

    /**
     * {@Inheritdoc}
     */
    public function isValid()
    {
        $properties = [
            'html'      => $this->getHtml(),
            'plainText' => $this->getPlainText(),
            'subject'   => $this->getSubject(),
            'fromEmail' => $this->getFromEmail(),
            'fromName'  => $this->getFromName(),
            'toEmail'   => $this->getToEmail(),
            'toType'    => $this->getToType(),
            'headers'   => $this->getHeaders(),
        ];

        foreach ($properties as $propertyKey => $propertyValue) {
            if (empty($propertyValue)) {
                throw new PropertyNotFountException('Property ' . $propertyKey . ' is not set');
            }
        }

        if (!array_key_exists('replyTo', $this->getHeaders())) {
            throw new PropertyNotFountException('Property replyTo is not set');
        }

        return true;
    }
}
