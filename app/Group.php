<?php

namespace gotham;

use Illuminate\Database\Eloquent\Model;
use Sluggable;

class Group extends Model
{
    use Sluggable;
    //
    protected $fillable = [
        'name',
    ];

    /* Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function users(){
        return $this->belongsToMany('gotham\User');
    }
}
