<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    Protected $table = "categories";

    public function user(){
        
        $this->hasMany(User::class);

    }
}
