<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

namespace Tall\Menus\Http\Livewire\Admin\Menus\Includes\Traits;


trait MenuOptions{
    
    public $cardModal = false;
    public $updated = false;
    public $currentMenu;

     
    public $menu;

    public $submenu;

    public $submenuitem;

    public $subitem;


    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function openModal(){
        $this->cardModal = true;            
     }
    /*
    |--------------------------------------------------------------------------
    |  Features order
    |--------------------------------------------------------------------------
    | Order visivel no me menu
    |
    */
    public function closeModal(){
       if($this->updated){
            if($this->currentMenu){
                $this->emit('loadMenus',[]);     
                $this->cardModal = true;  
                $this->reset(['data']);    
            }
       }
     }
    
    public function updatedDataAttributeRoute($value)       
    {
       foreach (\Route::getRoutes() as $route) {

           if (isset($route->action['as'])) :

               $name = $route->action['as'];

               if ($name == $value) :
                  data_set($this->data, 'attribute.path', $route->uri);
               endif;

           endif;
       }
    }
    
    public function getRoutesProperty(){
        return \Tall\Acl\LoadRouterHelper::make();
      }
}