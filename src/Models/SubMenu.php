<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

namespace Tall\Menus\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends AbstractModel
{
    use HasFactory;
    
    protected $guarded = ["id"];
    
    public function attribute()
    {
        return $this->morphOne(MenuAttribute::class, 'menu_attributeable');
    }

    public function sub_menu()
    {
        return $this->hasMany(SubMenu::class);
    }
    
    
    public function sub()
    {
        return $this->hasOne(SubMenu::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
