<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tacgia extends Model
{
    use HasFactory;

    protected $table = 'tacgia';

    protected $primaryKey = 'id';

    protected $fillable = [
        'tentacgia',
        'motatacgia',
        'anh',
    ];
}


