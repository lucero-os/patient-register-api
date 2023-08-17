<?php
namespace App\Interfaces;

interface iNotificationStrategy{
    /**
     * Sends notification
     * @param Array $data - notification related information
     */
    public function notify($data);
}