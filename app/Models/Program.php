<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = ['instructor_id', 'name'];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function qualifications()
    {
        return $this->hasMany(Qualification::class);
    }
}
