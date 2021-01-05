<?php

namespace App\Models\administrator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsLogos extends Model
{
    protected $table = 'details_logo';

    protected $fillable = [
        'name',
        'description',
        'logo_id',
        'branding_id',
    ];
}
