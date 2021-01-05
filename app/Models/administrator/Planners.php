<?php

namespace App\Models\administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planners extends Model
{
    use HasFactory;
    protected $table = 'planners';

    protected $fillable = [
        'path',
        'employee_id',
    ];
}
