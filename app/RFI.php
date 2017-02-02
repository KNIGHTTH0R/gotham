<?php

namespace gotham;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RFI extends Model
{

    protected $table = 'rfi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'body', 'submitter',
    ];

}
