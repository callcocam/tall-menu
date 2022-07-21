<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

if(!function_exists('load_menu_builder_view')){

    function load_menu_builder_view($view){
        return sprintf("tall-menus::livewire.admin.menus.includes.%s", $view);
    }
}


if(!function_exists('load_menu_builder_component')){

    function load_menu_builder_component($view){
        return sprintf("tall-menus::admin.menus.includes.%s", $view);
    }
}