<?php

namespace gotham;

use Illuminate\Database\Eloquent\Model;

class RFI extends Model
{
    //
    protected $table = 'rfis';
    
    protected $fillable = [
        'subject', 'body', 'project_id', 'user_id',
    ];
    
    public function project(){
        return $this->belongsTo('gotham\Project');
    }
    
    public function posts(){
        return $this->hasMany('gotham\RFIPost', 'rfi_id', 'id');
    }
    
    
}
