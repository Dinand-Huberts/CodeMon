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

    public function rarity() {
        return $this->hasOne(Rarity::class, 'id', 'card_rarity');
    } 

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function ability() {
        return $this->hasOne(Ability::class, 'id', 'ability');
    } 

    public function hidden_ability() {
        return $this->hasOne(Ability::class, 'id', 'hidden_ability');
    } 
}
