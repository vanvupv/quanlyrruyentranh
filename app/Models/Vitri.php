<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Vitri extends Model
{
    use HasFactory;

    protected $table = 'vitri';

    protected $primaryKey = 'id';

    protected $fillable = [
        'tenvitri',
        'motavitri',
        'anh',
    ];

    // public $timestamps = false;

    //
    public static function vitriExists($vitri)
    {
        return self::where('tenvitri', $vitri)->exists();
    }
}
