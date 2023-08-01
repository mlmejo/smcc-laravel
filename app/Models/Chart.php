<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
    ];

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function trainees()
    {
        return $this->belongsToMany(Trainee::class);
    }

    public function remarks()
    {
        return $this->hasMany(Remark::class);
    }
}
