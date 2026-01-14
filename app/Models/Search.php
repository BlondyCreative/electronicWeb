<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Search extends Model
{
    protected $fillable = [
'title', 'tags', 'category', 'path', 'price', 'description',
    ];
}
