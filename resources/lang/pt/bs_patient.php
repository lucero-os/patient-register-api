<?php

return array(
    'registered_successfuly' => 'O paciente foi registrado com sucesso',
    'already_registered' => 'Já existe um paciente para o e-mail :email',
    'validation' => array(
        'name' => array(
            'required' => 'O campo de nome é obrigatório.',
        ),
        'email' => array(
            'required' => 'O campo de email é obrigatório.',
            'email' => 'Por favor, forneça um endereço de email válido.',
        ),
        'phone' => array(
            'required' => 'O campo de telefone é obrigatório.',
            'regex' => 'Por favor, forneça um número de telefone válido com 10 dígitos.',
        ),
        'photo' => array(
            'required' => 'O campo de foto é obrigatório.',
            'image' => 'O arquivo enviado deve ser uma imagem.',
            'mimes' => 'Apenas imagens JPEG e PNG são permitidas.',
            'max' => 'O tamanho da foto não deve exceder 2MB.',
        ),
    ),
);
