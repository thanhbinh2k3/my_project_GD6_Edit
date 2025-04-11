<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // Các trường có thể gán đại trà (mass assignable) - bỏ 'accuracy'
    protected $fillable = ['filename', 'label', 'views', 'likes'];
    
    // Loại bỏ phương thức getAccuracy vì không cần thiết nữa
    // public function getAccuracy()
    // {
    //     return $this->accuracy; // Loại bỏ phương thức này
    // }

    public $timestamps = true; // Đảm bảo timestamps tự động
}
