<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Grade extends Model
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];

    public function subject(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
    public function student(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
