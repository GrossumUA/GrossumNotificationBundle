NotificationBundle to work with GrossumNotificationServer

Instalation:

    composer require ...
    
Register the bundle:

```php
    // app/AppKernel.php
    
    public function registerBundles()
    {
        $bundles = array(
            new GrossumUA\NotificationBundle\NotificationBundle(),
            new OldSound\RabbitMqBundle\OldSoundRabbitMqBundle(),
        );
    }
```

Add config:

```yaml

#app/config/config.yml
    
    old_sound_rabbit_mq:
        connections:
            default:
                host:     %notification_service_ip%
                port:     %notification_service_port%
                user:     %notification_service_user%
                password: %notification_service_pass%
                vhost:    %notification_service_vhost%
                lazy:     true
                connection_timeout: 3
                read_write_timeout: 3
                keepalive: false
                heartbeat: 0
        producers:
            send_sms:
                connection:       default
                exchange_options: {name: 'send-sms', type: direct}
            send_email:
                connection:       default
                exchange_options: {name: 'send-email', type: direct}
            send_push:
                connection:       default
                exchange_options: {name: 'send-push', type: direct}
            send_web:
                connection:       default
                exchange_options: {name: 'send-web', type: direct}
```

Add paramters:

```yaml

#app/config/paramters.yml

parameters:
    notification_service_ip: 127.0.0.1
    notification_service_port: 5642
    notification_service_user: user
    notification_service_pass: pass
    notification_service_vhost: vhost
```

Available notifications:

1. `EmailNotification`
2. `EntityDataDeleteNotification`
3. `EntityDataUpdateNotification`
5. `MessageNotification`
6. `PushNotification`
7. `SmsNotification`

Example usage:

```php

    $userNotification = new MessageNotification();
    
    $userNotification
        ->setType(NotificationInterface::SOCKET_NOTIFICATION_TYPE_WEB_NOTIFICATION)
        ->setContent('You have created task to demo NotificationBundle')
        ->setMediaUrl('https://pbs.twimg.com/profile_images/564783819580903424/2aQazOP3.png')
        ->setTitle('You have created task to demo NotificationBundle')
        ->setCreatedAt(new \DateTime())
        ->setRecipientHashes(['sds12']);

    $this->disptacher->dispatch(
        'grossum.notification.event.send_notification',
        new NotificationCreatedEvent($userNotification)
    );
``` 
           