<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Test extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function subject():BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function questions():HasMany
    {
        return $this->hasMany(Question::class);
    }
    public function scores():HasMany
    {
        return $this->hasMany(Score::class);
    }
    
}
