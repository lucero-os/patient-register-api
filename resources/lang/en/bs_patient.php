<?php

return array(
    'validation' => array(
        'name' => array(
            'required' => 'The name field is required.',
        ),
        'email' => array(
            'required' => 'The email field is required.',
            'email' => 'Please provide a valid email address.',
        ),
        'phone' => array(
            'required' => 'The phone field is required.',
            'regex' => 'Please provide a valid 10-digit phone number.',
        ),
        'photo' => array(
            'required' => 'The photo field is required.',
            'image' => 'The uploaded file must be an image.',
            'mimes' => 'Only JPEG and PNG images are allowed.',
            'max' => 'The photo size should not exceed 2MB.',
        ),
    )
);