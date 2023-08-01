<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    use HasFactory;

    protected $fillable = [
        'completed',
    ];

    public function chart()
    {
        return $this->belongsTo(Chart::class);
    }

    public function learningOutcome()
    {
        return $this->belongsTo(LearningOutcome::class);
    }

    public function trainee()
    {
        return $this->belongsTo(Trainee::class);
    }
}
