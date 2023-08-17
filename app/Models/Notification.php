<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function notificationTypes()
    {
        return $this->belongsToMany(NotificationType::class, 'notification_notification_type')
            ->withPivot('extra_column1', 'extra_column2');
    }
}