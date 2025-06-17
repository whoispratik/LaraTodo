<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
    protected $fillable = [
        'title',
        'is_completed',
        'due_date',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
