<?php

namespace gotham;

use Illuminate\Database\Eloquent\Model;
use Sluggable;

class RFIPost extends Model
{
    //
    use Sluggable;
   
    protected $table = "rfi_posts";
    
    protected $fillable = [
        'message', 'user_id', 'rfi_id',
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
    
    public function rfi(){
        return $this->belongsTo('gotham\RFI');
    }
}
