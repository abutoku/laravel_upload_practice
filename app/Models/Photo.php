<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    // protected $table = "upload_image";
    // protected $fillable = ["file_name", "file_path", "file_size"];

    public static function getAllOrderByUpdated_at()
    {
        return self::orderBy('updated_at', 'desc')->get();
    }
}
