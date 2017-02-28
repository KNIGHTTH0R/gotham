<?php

namespace gotham;

use Illuminate\Database\Eloquent\Model;

use Sluggable;

class Project extends Model
{
    //
    use Sluggable;

    
    protected $fillable = [
        'name', 'description','control_number',
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

    public function addUser(){

    }
    
    
    public function users(){
        return $this->belongsToMany('gotham\User');
    }
    
    public function rfis(){
        return $this->hasMany('gotham\RFI');
    }
    
     public function groups(){
        return $this->belongsToMany('gotham\Group');
    }
    
}
