<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $fillable = [
        'batch_id',
        'name',
        'email',
        'phone',
        'image',
    ];

    public function batch(): BelongsTo {
        return $this->belongsTo(Batch::class, 'batch_id');
    }
}
