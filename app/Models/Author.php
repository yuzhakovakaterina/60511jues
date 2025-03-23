<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model {
    use HasFactory;
    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'year_of_birth',
    ];
    public function book(): HasMany {
        return $this->hasMany(Book::class);
    }
}
