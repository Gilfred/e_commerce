<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $fillable=[
        'nom_articles',
        'prix',
        'stock_restant',
        'image'
    ];
}
