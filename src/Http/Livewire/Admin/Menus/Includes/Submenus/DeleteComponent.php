<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Menus\Http\Livewire\Admin\Menus\Includes\Submenus;

use Tall\Menus\Http\Livewire\AbstractDeleteComponent;
use Illuminate\Support\Facades\Route;
use Tall\Menus\Models\SubMenu;

class DeleteComponent extends AbstractDeleteComponent
{
   /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro vasio
    |
    */
    public function mount(?SubMenu $model)
    {
        $this->setFormProperties($model);
    }
    // menu\resources\views\livewire\admin\menu\includes\submenu\delete-component.blade.php
    protected function view(){
        return load_menu_builder_view("submenus.delete-component");
    }
}
