<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remarks extends Model
{
    /** @use HasFactory<\Database\Factories\RemarksFactory> */
    use HasFactory;
    protected $fillable = [
        'remark',
        'activity_id',
        'created_by'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function activity() {
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}
