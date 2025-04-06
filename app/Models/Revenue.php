<?php
// app/Models/Revenue.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    // Optional: Define the table name if it doesn't follow the default naming convention
    protected $table = 'revenues';

    // Optional: Define the columns that can be mass-assigned
    protected $fillable = ['date', 'quantity', 'total_amount'];

    // Optional: If you use timestamps, leave this, otherwise set false if you don't need created_at/updated_at
    public $timestamps = true;
}
