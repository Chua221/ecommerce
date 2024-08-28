<?php

namespace App\Models;
use App\Models\vegetables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    use HasFactory;
    protected $fillable=['veg_mass','veg_price','veg_id','user_id'];

    public function img(){
        return $this->belongsTo(vegetables::class, 'veg_id');
    }
}
