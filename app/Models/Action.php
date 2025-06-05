<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    /** @use HasFactory<\Database\Factories\ActionFactory> */
    use HasFactory;
    protected $fillable = [
        'action',
        'user_id',
        'activity_id'
    ];


    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function activity() {
        return $this->belongsTo(Activity::class, 'activity_id');
    }

}
