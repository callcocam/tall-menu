<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Menus\Http\Livewire\Admin\Menus\Includes\Submenus;

use Tall\Menus\Models\Menu;
use Tall\Menus\Models\SubMenu;
use Tall\Menus\Http\Livewire\FormComponent;
use Illuminate\Support\Facades\Route;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Menus\Http\Livewire\Admin\Menus\Includes\Traits\MenuOptions;

class AddComponent extends FormComponent
{

    use AuthorizesRequests, MenuOptions;

    public $updated = false;

    
    public $listeners = ['openModal'];

   /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro vasio
    |
    */
    public function mount(?Menu $model)
    {
        data_set($this->data ,'menu_id',$model->id);

        $this->setFormProperties(app(SubMenu::class));
    }

     /**
     * @param null $model
     */
    protected function setFormProperties($model = null)
    {
        $this->model = $model;
        
        data_set($this->data ,'name','');
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
       
       if(parent::success()){
        $this->model->attribute()->create(data_get($this->data ,'attribute'));
        $this->emit('loadMenus',[]);
        $this->updated = true;
       }
     }

    protected function view(){
        return load_menu_builder_view("submenus.add-component");
    }

    public function getTitleProperty(){
        return sprintf('ADICIONAR AO MENU PRINCIPAL - %s', $this->model->name);

    }
    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function closeModal(){
        if($this->updated)
            return redirect()->route(config('menu.routes.menu.builder'), ['model'=>$this->menu]);         
     }
}
