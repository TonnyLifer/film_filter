<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $appends = ['stars']; 

    public function director(){
        return $this->hasOne(Director::class, 'id', 'director_id');
    }

    public function rating(){
        return $this->hasMany(Rating::class);
    }

    public function genre(){
        return $this->hasOne(Genre::class, 'id', 'genre_id');
    }

    public function actors_id(){
        return $this->hasMany(FilmActor::class);
    }

    public function actors(){
        return $this->HasManyThrough(
            ACtor::class,
            FilmActor::class,
            'film_id',
            'id',
            'id',
            'actor_id'
        );
    }

    public function getStarsAttribute(){
        return Rating::where('film_id', $this->id)->avg('rating');
    }
}
