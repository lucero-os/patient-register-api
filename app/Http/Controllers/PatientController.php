<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Exceptions\CustomException;

class PatientController extends Controller
{

    public function registerPatient(Request $request){
        \Log::debug('PatientController::registerPatient - start');

        $data = $request->all();
        $validator = \Validator::make($data, [
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^\d{10}$/',
            // 'photo' => 'required|image|mimes:jpeg,png|max:2048', // Max file size: 2MB
            'photo' => 'image|mimes:jpeg,png|max:2048', // Max file size: 2MB
        ], [
            'name.required'     => trans('bs_patient.validation.name.required'),
            'email.required'    => trans('bs_patient.validation.email.required'),
            'email.email'       => trans('bs_patient.validation.email.email'),
            'phone.required'    => trans('bs_patient.validation.phone.required'),
            'phone.regex'       => trans('bs_patient.validation.phone.regex'),
            'photo.required'    => trans('bs_patient.validation.photo.required'),
            'photo.image'       => trans('bs_patient.validation.photo.image'),
            'photo.mimes'       => trans('bs_patient.validation.photo.mimes'),
            'photo.max'         => trans('bs_patient.validation.photo.max'),
        ]);
    
        if ($validator->fails()) {
            $message = $validator->errors()->first();
            throw new CustomException($message);
        }

        \DB::beginTransaction();

        try{
            $patientService = new \PatientService();
            $patient = $patientService->register(
                $data['name'],
                $data['email'], 
                $data['phone'], 
                $data['photo']
            );

            $notificationService = new \NotificationService('new_patient');
            $notificationService->notify($data);
        }catch(\Exception $e){
            \DB::rollback();
            \Log::debug('PatientController::registerPatient - error');
            throw $e;
        }

        \DB::commit();
        \Log::debug('PatientController::registerPatient - end');

        return \Response::json(array('message' => trans('bs_patient.registered_successfuly')));
    }
}
