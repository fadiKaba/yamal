<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Photo;
use App\Models\Supplier;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'supplier_id', 'product_size', 'product_price', 'photo_id'];

    public function photo(){
        return $this->belongsTo(Photo::class, 'photo_id', 'id');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
