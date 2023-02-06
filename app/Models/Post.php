<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Eloquent
{

    use Searchable;
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
        'price',
        'contact'
    ];

    public function searchableAs()
    {
        return 'posts_index';
    }


    public function toSearchableArray(){

        return [
            'brand' => $this->brand,
            'model' => $this->model,
            'fuel' => $this->fuel,
            'body' => $this->body,
            'colour' => $this->colour,
            'description' => $this->description
        ];
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
     }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function($post) {
            $post->delete();
        });
    }


}
