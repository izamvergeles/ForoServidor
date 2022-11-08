<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    
    public $fillable = ['mensaje', 'idusuario'];
    
     public function usuario(){
        return $this->belongTo('App\Models\Usuario', 'idusuario');
    }
}
