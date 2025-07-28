<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrow extends Model
{
    protected $fillable = [
        "student_id",
        "book_id",
        "borrowed_at",
        "returned_at",
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    use HasFactory;
}
