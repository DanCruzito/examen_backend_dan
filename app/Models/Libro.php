<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libros';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

}
