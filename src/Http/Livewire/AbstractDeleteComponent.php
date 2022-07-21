<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

namespace Tall\Menus\Http\Livewire;

use Livewire\Component;
use WireUi\Traits\Actions;

abstract class AbstractDeleteComponent extends Component
{
    use Actions;    
    public $model;
    
    abstract protected function view();

       /**
     * @param null $model
     */
    protected function setFormProperties($model = null)
    {
        $this->model = $model;
    }
    
    public function render(){      
        return view($this->view());
    }

    public function kill($value)
    {
        if($value){
            if($this->model->delete()){       
                $this->notification()->success(
                    $title = __('Deleted'),
                    $description = __("Registro excluido com sucesso :)")
                );
            }
            $this->emit('loadMenus',[]);
       }
    }
}
