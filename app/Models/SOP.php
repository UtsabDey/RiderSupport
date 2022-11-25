<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SOP extends Model
{
    use HasFactory;
    protected $table = 's_o_p_s';

    protected $fillable = [
        'title', 'link'
    ];
}
