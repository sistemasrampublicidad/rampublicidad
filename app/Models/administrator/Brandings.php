<?php

namespace App\Models\administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brandings extends Model
{
    protected $table = 'brandings';

    protected $fillable = [
        'customer_id',
    ];
}
