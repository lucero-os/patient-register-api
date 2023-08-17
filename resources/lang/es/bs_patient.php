<?php

return array(
    'registered_successfuly' => 'El paciente ha sido registrado con éxito',
    'already_registered' => 'Ya existe un paciente para el mail :email',
    'validation' => array(
        'name' => array(
            'required' => 'El campo de nombre es obligatorio.',
        ),
        'email' => array(
            'required' => 'El campo de correo electrónico es obligatorio.',
            'email' => 'Por favor, proporciona una dirección de correo electrónico válida.',
        ),
        'phone' => array(
            'required' => 'El campo de teléfono es obligatorio.',
            'regex' => 'Por favor, proporciona un número de teléfono válido de 10 dígitos.',
        ),
        'photo' => array(
            'required' => 'El campo de foto es obligatorio.',
            'image' => 'El archivo subido debe ser una imagen.',
            'mimes' => 'Solo se permiten imágenes JPEG y PNG.',
            'max' => 'El tamaño de la foto no debe exceder los 2MB.',
        ),
    ),
);
