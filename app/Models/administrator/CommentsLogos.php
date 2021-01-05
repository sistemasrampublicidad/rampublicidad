<?php

namespace App\Models\administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentsLogos extends Model
{
    protected $table = 'comments_logos';

    protected $fillable = [
        'comment',
        'type',
        'status',
        'logo_id',
        'commentator_id',
    ];
}
