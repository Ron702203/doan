<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // i added this

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'img', 'desc', 'category_id'];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
