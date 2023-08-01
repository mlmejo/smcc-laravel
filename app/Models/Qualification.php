<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function competencies()
    {
        return $this->hasMany(Competency::class);
    }

    public function charts()
    {
        return $this->hasMany(Chart::class);
    }
}
