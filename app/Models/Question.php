<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function test():BelongsTo
    {
        return $this->belongsTo(Test::class);
    }

    public function answers():HasMany
    {
        return $this->hasMany(Answer::class);
    }
    public function student_answers():HasMany
    {
        return $this->hasMany(StudentAnswer::class);
    }
}
