<?php

namespace App;

use Faker\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    //
    protected $fillable = [
        'title',
        'short_desc',
        'author',
        'release_year',
        'publisher'
    ];

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $faker = Factory::create();
            $model->cover = 'https://picsum.photos/500/300?image=' . $faker->numberBetween(10,1000);
        });
    }

    public function setAttribute($key,$value)
    {
        $snake = Str::snake($key);
        return parent::setAttribute($snake,$value);
    }

    public function getAttribute($key)
    {
        if(array_key_exists($key,$this->relations)){
            return parent::getAttribute($key);
        }else
            return parent::getAttribute(Str::snake($key));
    }
}
