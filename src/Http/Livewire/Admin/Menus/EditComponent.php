<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Menus\Http\Livewire\Admin\Menus;

use Tall\Menus\Models\Menu;
use Tall\Menus\Http\Livewire\FormComponent;
use Illuminate\Support\Facades\Route;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EditComponent extends FormComponent
{

    use AuthorizesRequests;
    
   /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro vasio
    |
    */
    public function mount(?Menu $model)
    {
        $this->authorize(Route::currentRouteName());
        $this->setFormProperties($model); 
       }

    protected function rules(){
        return [
             'name'=>'required'
        ];
     }

    
    protected function view(){
        return "menu::livewire.admin.menus.edit-component";
    }
}
