<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reader extends Model {
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'date_of_birth',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function books(): BelongsToMany {
        return $this->belongsToMany(Book::class, 'deliveries')
            ->withPivot(['date_in', 'date_out', 'date_out_plan']);
    }
}

