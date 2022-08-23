<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

   // protected  $primaryKey = 'roleName'; // changed the primery key in order to use find method according to its roleName
   // public $incrementing = false; //because your new primary key roleName is not integer

    public function users(){
        return $this->hasMany(User::class);
    }
}
