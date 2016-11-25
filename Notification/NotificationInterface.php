<?php

namespace GrossumUA\NotificationBundle\Notification;

interface NotificationInterface
{
    const SOCKET_NOTIFICATION_TYPE_ENTITY_UPDATE = 'entity_update';
    const SOCKET_NOTIFICATION_TYPE_ENTITY_DELETE = 'entity_delete';
    const SOCKET_NOTIFICATION_TYPE_CHAT_MESSAGE = 'chat_message';
    const SOCKET_NOTIFICATION_TYPE_WEB_NOTIFICATION = 'web_notification';

    const PHONE_OS_TYPE_IOS = 'phone_ios';
    const PHONE_OS_TYPE_WINDOWS = 'phone_windows';
    const PHONE_OS_TYPE_ANDROID = 'phone_android';

    /**
     * @return array
     */
    public function exportData();

    /**
     * @return bool
     */
    public function isValid();
}
