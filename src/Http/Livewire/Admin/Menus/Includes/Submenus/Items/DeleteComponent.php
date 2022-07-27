<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Menus\Http\Livewire\Admin\Menus\Includes\Submenus\Items;

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
  
    protected function view(){
        return "menu::livewire.admin.menu.includes.submenus.delete-component";
    }
}
