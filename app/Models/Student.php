<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];

    public function grade():BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }
    public function student_answers():HasMany
    {
        return $this->hasMany(StudentAnswer::class);
    }
    public function scores():HasMany
    {
        return $this->hasMany(Score::class);
    }

}
