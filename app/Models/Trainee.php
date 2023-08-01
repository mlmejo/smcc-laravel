<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainee_number',
        'last_name',
        'first_name',
        'middle_initial',
    ];

    public function charts()
    {
        return $this->belongsToMany(Chart::class);
    }

    public function remarks()
    {
        return $this->hasMany(Remark::class);
    }
}
