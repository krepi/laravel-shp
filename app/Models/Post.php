<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Post extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'posts';



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'brand',
        'model',
        'mileage',
        'fuel',
        'body',
        'colour',
        'description',
        'image1',
        'image2',
        'image3',
        'image4',
        'images',
        'user_id',
        'price'
    ];
public function user(){
    return $this->belongsTo(User::class, 'user_id');
}


}
