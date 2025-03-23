<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model {
    use HasFactory;
    protected $fillable = [
        'books_name',
        'author_id',
        'isbn',
        'status',
    ];
    public $timestamps = false;

    public function author(): BelongsTo {
        return $this->belongsTo(Author::class);
    }
    public function reader(): BelongsToMany {
        return $this->belongsToMany(Reader::class, 'deliveries');
    }
}
