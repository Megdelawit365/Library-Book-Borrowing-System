<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    protected $fillable = [
        "title",
        "author",
        "category_id",
        "stock",
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function borrow()
    {
        return $this->hasMany(Book::class);
    }
    use HasFactory;
}
