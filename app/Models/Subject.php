<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];

    public function grade():BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }
    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class);
    }
    public function post(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function tests(): HasMany
    {
        return $this->hasMany(Test::class);
    }
}
