<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Follow extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'follows';

    protected $fillable = [
        'user_id',
        'followedpost',
    ];
}
