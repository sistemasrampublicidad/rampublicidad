<?php

namespace App\Models\administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logos extends Model
{
    use HasFactory;
    protected $table = 'logos';

    protected $fillable = [
        'path',
        'employee_id',
        'type_id'
    ];
}
