<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    
    public $fillable = ['mensaje', 'idpost', 'idusuario'];
    
     public function usuario(){
        return $this->belongTo('App\Models\Usuario', 'idusuario');
    }
    public function post(){
        return $this->belongTo('App\Models\Post', 'idpost');
    }
}
