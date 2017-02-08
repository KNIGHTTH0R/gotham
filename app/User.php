<?php

namespace gotham;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hashids;

class User extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'permission_level', 'account_status',
    ];
    
    /**
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public function getRouteKey()
    {
        
        return Hashids::encode($this->getKey());
    }
    
    public function projects(){
        
        return $this->belongsToMany('gotham\Project');
    }
    
    public function rfis(){
        
        return $this->hasMany('gotham\RFI');
    }
    
    public function rfi_posts(){
        
        return $this->hasMany('gotham\RFIPost');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
