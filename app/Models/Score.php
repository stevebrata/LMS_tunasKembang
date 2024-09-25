<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Score extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function test():BelongsTo
    {
        return $this->belongsTo(Test::class);
    }

    public function student():BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
