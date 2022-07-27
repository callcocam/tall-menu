<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

namespace Tall\Menus\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu  extends AbstractModel
{
    use HasFactory;
    
    protected $guarded = ["id"];
    
//     protected $with = ['attribute', 'columns'];
    
//     protected $casts = [
//       'foreigns_table' => 'array'
//   ];
  
    public function sub_menu()
    {
        return $this->hasMany(SubMenu::class);
    }
}
