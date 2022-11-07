<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['name', 'surname', 'review_text', 'vote'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
