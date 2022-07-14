<?php

return [

    'styles' => [
     
    ],
    'ordering' => true,
    "routes"=>[
        "menus"=>[
            'list'=>'tall-menus.admin.menus',
            'create'=>'tall-menus.admin.menus.create',
            'edit'=>'tall-menus.admin.menus.edit',
            'builder'=>'tall-menus.admin.menus.builder',
        ]
    ]

];
