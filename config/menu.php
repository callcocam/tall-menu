<?php

return [
    "layout"=>"theme::layouts.app",
    'styles' => [
     
    ],
    'ordering' => true,
    "routes"=>[
        "menu"=>[
            'list'=>'menu.admin.menu',
            'create'=>'menu.admin.menu.create',
            'edit'=>'menu.admin.menu.edit',
            'builder'=>'menu.admin.menu.builder',
        ]
    ]

];
