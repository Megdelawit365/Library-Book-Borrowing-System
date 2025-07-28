<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    protected $fillable = [
        "name",
        "student_id"
    ];
    public function borrow()
    {
        return $this->hasMany(Borrow::class);
    }
    use HasFactory;
}
