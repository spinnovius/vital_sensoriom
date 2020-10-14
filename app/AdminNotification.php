<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model
{
    protected $table = 'notification';
    protected $fillable = [
        'from_id', 'to_id', 'notification_description', 'status'
    ];
}
