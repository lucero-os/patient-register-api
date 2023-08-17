<?php

namespace App\Http\Services;
use App\Models\Patient;

class PatientService{
    /**
     * Registers new patient
     * @param String $name 
     * @param String $email 
     * @param String $phone 
     * @param File $photo 
     * Returns Patient $patient
     */
    public function register(
        $name,
        $email,
        $phone,
        $photo
    )
    {
        \Log::debug('PatientService::register - start registering '.$name);

        $patient = new Patient();
        $patient->patient_name = $name;
        $patient->patient_email = $email;
        $patient->patient_phone = $phone;
        $patient->save();

        try{
            //Upload to google platform
            $photoPath = 'patients/patient_'.$patient->id;
            Storage::disk('gcs')->put($photoPath, file_get_contents($photo));
        }catch(\Exception $e){
            \Log::debug('PatientService::register - error uploading photo to google cloud services');
            throw $e;
        }

        $patient->photo_path = $photoPath;
        $patient->save();

        \Log::debug('PatientService::register - end');
        return $patient;
    }
}