<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    //relacion Elocuent con filtro de campos a devolver
    public function user()
    {
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }
}
