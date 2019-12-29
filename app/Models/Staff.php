<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    protected $fillable = ['full_name', 'dob', 'department_id', 'position', 'rate', 'clock', 'payment'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
