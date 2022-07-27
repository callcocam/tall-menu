<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Menus\Http\Livewire\Admin\Menus\Includes\Submenus\Items;

use Tall\Menus\Models\Menu;
use Tall\Menus\Models\SubMenu;
use Tall\Menus\Http\Livewire\FormComponent;
use Illuminate\Support\Facades\Route;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Menus\Http\Livewire\Admin\Menus\Includes\Traits\MenuOptions;

class AddComponent extends FormComponent
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

     /**
     * @param null $model
     */
    protected function setFormProperties($model = null)
    {
        $this->menu = $model->menu;
        $this->model = $model;
        data_set($this->data ,'sub_menu_id',$this->model->id);
        data_set($this->data ,'attribute.route','');
        data_set($this->data ,'attribute.path','');
        data_set($this->data ,'attribute.icon','');
        data_set($this->data ,'attribute.template','');
    }

    protected function rules(){
        return [
             'name'=>'required'
        ];
     }

     public function success(){
        // if(parent::success()){
            $model = $this->model->sub_menu()->create($this->data);
            $model->attribute()->create(data_get($this->data ,'attribute'));
            $this->emit('loadMenus',[]);
        // }
      }

    protected function view(){
        return load_menu_builder_view("submenus.includes.items.add-component");
    }

    public function getTitleProperty(){
        return sprintf('ADICIONAR SUB MENU - %s', $this->model->id);

    }
}
