<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    use HasFactory;

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    } 

    public function user() {
        return $this->belongsTo(User::class);
    }
}
