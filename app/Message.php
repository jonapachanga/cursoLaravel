<?php

namespace App;

use App\Events\MessagesSaving;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * En caso de que la tabla se llame diferente al modelo tenemos que indicarselo
     * a traves de la variable $table, si va a buscar la tabla que se llame igual que el modelo
     * pero en miniscula y en plural.
     */
    
    //protected $table = 'nombre_de_la_tabla';

    /**
     * Campos que se le permiten que ingresen en la DB
     */

     protected $fillable = ['nombre', 'email', 'mensaje'];

    protected $dispatchesEvents = [
        'saving' => MessagesSaving::class,
    ];

     public function user()
     {
         return $this->belongsTo(User::class);
     }
     public function note()
     {
         return $this->morphOne(Note::class, 'notable');
     }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}

