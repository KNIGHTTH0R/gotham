<?php

namespace gotham;

use Illuminate\Database\Eloquent\Model;

class RFI extends Model
{
    //
    protected $table = 'rfi';
    
    protected $fillable = [
        'subject', 'body', 'project_id', 'user_id',
    ];
    
    public function project(){
        return $this->belongsTo('gotham\Project');
    }
}
