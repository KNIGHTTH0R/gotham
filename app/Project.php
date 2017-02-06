<?php

namespace gotham;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'name', 
    ];
    
    public function users(){
        return $this->belongsToMany('gotham\User');
    }
    
    public function rfis(){
        return $this->hasMany('gotham\RFI');
    }
}
