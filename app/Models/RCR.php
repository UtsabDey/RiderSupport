<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RCR extends Model
{
    use HasFactory;
    protected $table = 'r_c_r_s';

    protected $fillable = [
        'title', 'link'
    ];
}
