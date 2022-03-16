<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    use HasFactory;

    public function teacher() {
        return $this->hasOne(Teacher::class, 'id', 'teacher_id');
    } 

    public function rarity() {
        return $this->hasOne(Rarity::class);
    } 

    public function user() {
        return $this->belongsTo(User::class);
    }
}
