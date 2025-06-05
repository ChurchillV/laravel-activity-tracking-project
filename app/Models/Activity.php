<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /** @use HasFactory<\Database\Factories\LogFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'created_by'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function actions() {
        return $this->hasMany(Action::class);
    }

    public function remarks() {
        return $this->hasMany(Remarks::class);
    }
}
