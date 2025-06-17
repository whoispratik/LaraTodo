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

    protected $casts = [
        'is_completed' => 'boolean',
        'due_date' => 'datetime:Y-m-d'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
