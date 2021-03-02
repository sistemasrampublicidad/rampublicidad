<?php

namespace App\Models\administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsPlanners extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'idea',
        'description',
        'planner_id',
        'branding_id',
        'post_reason',
        'platform',
        'caption',
        'extension',
        'is_approved'

    ];
}
