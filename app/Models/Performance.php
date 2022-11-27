<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    use HasFactory;
    protected $table = 'performances';

    protected $fillable = [
        'A_id', 'A_name', 'daily_report',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'A_id', 'id');
    }
}
