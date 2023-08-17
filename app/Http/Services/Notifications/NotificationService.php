<?php

namespace App\Http\Services\Notifications;
use App\Http\Services\MailService;
use App\Models\Notification;

class NotificationService{
    protected $notification;

    __construct($notificationCode)
    {
        $this->notification = Notification::where('notification_code', $notificationCode)->first();
    }

    private function getNotificationService($notificationTypeCode)
    {
        $service = null;

        switch($notificationTypeCode){
            case 'MAIL':
                $service = new MailService();
                break;
            default:
                throw new \Exception('Notification provider not available');
        }

        return $service;
    }

    public function notify($data)
    {
        \Log::debug('NotificationService::notify - start notification '.$this->notification->notification_name);
        
        $notificationTypes = $this->notification->notificationTypes;
        
        foreach($notificationTypes as $ns){
            $notificationStrategy = $this->getNotificationService($ns->notification_type_code);
            $notificationStrategy->notify($data);
        }

        \Log::debug('NotificationService::notify - end');
    }
}