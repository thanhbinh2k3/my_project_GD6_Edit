<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Chỉ định các trường có thể mass-assign
    protected $table = 'posts'; // Đảm bảo đây là tên bảng đúng trong MySQL
    protected $fillable = ['id', 'title', 'category', 'status'];

    public $timestamps = true; // Đảm bảo timestamps tự động
}

