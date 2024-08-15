<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vegetables extends Model
{
    use HasFactory;

    protected $fillable=['v_name','image','mess','price'];
}
