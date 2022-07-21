<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Menus\Http\Livewire\Admin\Menus\Includes\Submenus\Items;

use Tall\Menus\Models\SubMenu;
use Tall\Menus\Http\Livewire\FormComponent;
use Illuminate\Support\Facades\Route;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Menus\Http\Livewire\Admin\Menus\Includes\Traits\MenuOptions;

class UpdateComponent extends FormComponent
{

    use AuthorizesRequests, MenuOptions;
    

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

    protected function rules(){
        return [
             'name'=>'required'
        ];
     }

     
     public function success(){
        if(parent::success()){
         $this->updated = true;
         $this->currentMenu = $this->menu;
         $this->emit('loadMenus',$this->data);
        }
      }

    
    protected function view(){
        return load_menu_builder_view("submenus.includes.items.update-component");
    }

    public function getTitleProperty(){
        return sprintf("ALTERAR ITEM DO MENU - %s", $this->model->name);
    }
}
