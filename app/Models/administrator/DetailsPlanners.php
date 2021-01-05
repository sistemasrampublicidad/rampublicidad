<?php

namespace App\Models\administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsPlanners extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'planner_id',
        'branding_id',
    ];
}
