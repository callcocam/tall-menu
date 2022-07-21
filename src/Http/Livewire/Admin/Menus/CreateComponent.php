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

class CreateComponent extends FormComponent
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
        $this->setFormProperties($model); // $permission from hereon, called $this->model
        $this->data['created_at']=now()->format('Y-m-d H:i:s');
        $this->data['updated_at']=now()->format('Y-m-d H:i:s');
    }

    protected function rules(){
        return [
             'name'=>'required'
        ];
     }

    
    protected function view(){
        return "tall-menus::livewire.admin.menus.create-component";
    }

      /*
    |--------------------------------------------------------------------------
    |  Features saveAndGoBackResponse
    |--------------------------------------------------------------------------
    | Rota de redirecionamento apos a criação bem sucedida de um novo registro
    |
    */
     /**
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function saveAndGoBackResponse()
    {
        return redirect()->route(config('menus.routes.menus.edit'), $this->model);
    }

}
