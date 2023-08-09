<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    const borrador=0;
    const publicado=1;
    protected $guarded = ['id','created_at','updated_at'];
}
