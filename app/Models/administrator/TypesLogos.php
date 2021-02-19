<?php

namespace App\Models\administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesLogos extends Model
{
    use HasFactory;
    protected $table = 'types_logo';

    protected $fillable = [
        'name',
        'description'
    ];
}
