<?php

namespace HCWS\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalType extends Model
{

    const DOG = 1;
    const CAT = 2;
    const OTHER = 3;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'animal_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The attribute that are guarded and not mass assignable
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
