<?php

namespace HCWS\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'animals';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'breed', 'description', 'animal_type_id', 'adopted', 'adoption_date', 'adopter_name'
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


    public function type() {
        return $this->belongsTo('HCWS\Models\AnimalType', 'animal_type_id');
    }


    public function animalPhotos(){
        return $this->hasMany('HCWS\Models\AnimalPhoto');
    }
}
