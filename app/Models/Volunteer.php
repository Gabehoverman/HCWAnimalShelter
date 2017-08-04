<?php

namespace HCWS\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'volunteers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'photo_id'
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


    public function photo() {
        return $this->belongsTo('HCWS\Models\Photo');
    }
}
