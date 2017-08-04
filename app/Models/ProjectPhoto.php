<?php

namespace HCWS\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectPhoto extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'project_photos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'photo_id'
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


    public function project() {
        return $this->belongsTo('HCWS\Models\Project');
    }

    public function photo() {
        return $this->belongsTo('HCWS\Models\Photo');
    }
}
