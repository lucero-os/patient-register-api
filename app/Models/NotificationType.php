<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationType extends Model
{
    public function notifications()
    {
        return $this->belongsToMany(Notification::class, 'notification_notification_type');
    }
}
