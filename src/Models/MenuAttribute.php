<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

namespace Tall\Menus\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuAttribute extends AbstractModel
{
    use HasFactory;
    
    protected $guarded = ["id"];

    
    /**
     * Get the parent menu_attributeable model (user or tenant).
     */

    public function menu_attributeable()
    {
        return $this->morphTo();
    }

    /**
     * @return string
     */
    protected function slugTo()
    {
        return false;
    }

    public function isUser(){
        return false;
    }

    public function sub_menu()
    {
        return $this->hasOne(SubMenu::class);
    }
    
}
