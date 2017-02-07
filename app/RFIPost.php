<?php

namespace gotham;

use Illuminate\Database\Eloquent\Model;

class RFIPost extends Model
{
    //
    protected $table = "rfi_posts";
    
    protected $fillable = [
        'message', 'user_id', 'rfi_id',
    ];
    
    public function rfi(){
        return $this->belongsTo('gotham\RFI');
    }
}
