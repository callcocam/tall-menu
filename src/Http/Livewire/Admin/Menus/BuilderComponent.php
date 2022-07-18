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

class BuilderComponent extends FormComponent
{

    use AuthorizesRequests;
    
    public $perPage = "12";
    public $sortable = false;

    protected $listeners = ['loadMenus'];

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
        $this->sortable = request()->query('sortable', false);
        $this->setFormProperties($model);

    }

     /**
     * @param null $model
     */
    protected function setFormProperties($model = null)
    {

        parent::setFormProperties($model);

        $this->load();
        
    }

    protected function rules(){
        return [
             'name'=>'required'
        ];
     }
    
    protected function view(){
        return "tall-menus::livewire.admin.menus.builder-component";
    }

    public function load()
    {
        if($submenus = $this->model->sub_menus){
            foreach($submenus as $submenu){
                \Menu::create($this->model->name, function($menu) use($submenu){
                    if($submenu->sub_menus->count()){                      
                        $this->dropdown($menu, $submenu);     
                    }
                    else{
                       $this->route($menu, $submenu);
                    }
                });
            }

        }
    }

    protected function route($menu, $item)
    {
        if($attribute = $item->attribute){
            $menu->route(data_get($attribute, 'route'), data_get($item, 'name'))
            ->model($item);
        }
    }
   
    protected function dropdown($menu, $submenu)
    {
            $menu->dropdown($submenu->name, 
                function ($sub) use($submenu) {    
                    foreach($submenu->sub_menus as $item){
                        if($item->sub_menus->count()){                      
                            $this->dropdown($sub, $item);  
                        }   
                        else{
                            $this->route($sub, $item);
                        }
                    }
                },[])
                ->order($submenu->order)
                ->model($submenu); 
            
    }

    public function loadMenus($data = [])
    {
       $this->load();
    }

    public function updateGroupMenuOrder($data = [])
    {
        $this->load();
    }

    public function updateSubMenuOrder($data = [])
    {
        $this->load();
    }

    public function activeOrder()
    {
        $sortable = !$this->sortable;
        $model = $this->model;
        return redirect()->route(config('menus.routes.menus.builder'), compact('model','sortable'));
    }
}
