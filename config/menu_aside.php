<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'fas fa-tachometer-alt', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],

        // Custom
        [
            'section' => 'Manchas',
        ],
        [
            'title' => 'Análises',
            'root' => true,
            'icon' => 'fab fa-cloudsmith',
            'page' => 'builder',
            'visible' => 'preview',
        ],

        // Administrativo
        [
            'section' => 'Administrativo',
        ],
        [
            'title' => 'Usuários',
            'icon' => 'fas fa-user',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Em Aprovação',
                    'page' => '/admin/on-approval'
                ],
                [
                    'title' => 'Listagem',
                    'page' => '/admin/list/users'
                ]
            ]
        ]
    ]
];
