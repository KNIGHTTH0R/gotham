<?php

namespace gotham;

use Illuminate\Database\Eloquent\Model;
use Sluggable;

class RFI extends Model
{
    //
    
    use Sluggable;
    
    protected $table = 'rfis';
    
    protected $fillable = [
        'subject', 'body', 'project_id', 'user_id', 'control_number',
    ];
    
    /* Return the sluggable configuration array for this model. 
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'subject'
            ]
        ];
    }
    
    public function project(){
        return $this->belongsTo('gotham\Project');
    }
    
    public function posts(){
        return $this->hasMany('gotham\RFIPost', 'rfi_id', 'id');
    }
    
    public function setControlNumber(){
        $this->control_number = getRouteKey() + 1000;
    }
    
    
}
