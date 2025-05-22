<?php

return [

    'required' => 'O campo :attribute é obrigatório.',
    'string'   => 'O campo :attribute deve ser uma string.',
    'min'      => [
        'string' => 'O campo :attribute deve ter no mínimo :min caracteres.',
    ],
    'in'       => 'O campo :attribute deve conter um dos seguintes valores: :values.',
    'exists'   => 'O valor selecionado para :attribute é inválido.',

    'attributes' => [
        'title'       => 'título',
        'description' => 'descrição',
        'status'      => 'status',
        'category_id' => 'categoria',
        'name'        => 'nome',
    ],

    'custom' => [
        'title' => [
            'required' => 'Por favor, informe o título.',
            'string'   => 'O título deve ser um texto válido.',
            'min'      => 'O título deve ter no mínimo 3 caracteres.',
        ],
        'description' => [
            'required' => 'Por favor, informe a descrição.',
            'string'   => 'A descrição deve ser um texto válido.',
            'min'      => 'A descrição deve ter no mínimo 5 caracteres.',
        ],
        'status' => [
            'required' => 'Por favor, informe o status.',
            'in'       => 'O status deve ser um dos seguintes: aberto, em progresso, resolvido.',
        ],
        'category_id' => [
            'required' => 'Por favor, selecione uma categoria.',
            'exists'   => 'A categoria selecionada é inválida.',
        ],
        'name' => [
            'required' => 'Por favor, informe o nome.',
            'string'   => 'O nome deve ser um texto válido.',
            'min'      => 'O nome deve ter no mínimo 3 caracteres.',
        ],
    ],

];
