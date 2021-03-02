<?php

namespace App\Models\administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentsPlanners extends Model
{
    protected $table = 'comments_planners';

    protected $fillable = [
        'comment',
        'type',
        'status',
        'planner_id',
        'commentator_id',
    ];
}
