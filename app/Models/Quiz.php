<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function instances()
    {
        return $this->belongsToMany(User::class, 'quiz_instances', 'quiz_id', 'user_id')
            ->withPivot('current_question_id', 'answers')
            ->withTimestamps();
    }
}
