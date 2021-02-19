<?php

namespace App\Models\administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesPlanners extends Model
{
    use HasFactory;
    protected $table = 'types_planner';

    protected $fillable = [
        'name',
        'description'
    ];
}
