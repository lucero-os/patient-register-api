<?php

class MailService implements iNotificationStrategy{
    
    public function notify($data){
        // Queue the email for sending asynchronously
        Mail::to($data['email'])->queue(new BaseMail($data));

        //Save patient notification
        $patientNotification = new \EmailNotification();
        $patientNotification->destinatary_email = $data['email'];
        $patientNotification->notification_id = $this->notification->id;
        $patientNotification->save();
    }
}