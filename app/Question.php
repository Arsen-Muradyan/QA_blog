<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'description'];
    public function user() {
        $this->belongsTo(User::class);
    }
    public function answers() {
        return $this->hasMany(Answer::class);
    }
}
