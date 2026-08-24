<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cars extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'cars';
    protected $fillable = [
        'name',
        'model',
        'status',
        'year',
        'colour',
        'price',
        'image',
    ];
}
