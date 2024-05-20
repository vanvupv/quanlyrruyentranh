<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anh extends Model
{
    use HasFactory;
    protected $primaryKey = 'IDImage';
    protected $table = 'anhs';

    protected $fillable = [
        'IDImage',
        'IDSanPham',
        'address',
        'title',
    ];
}
