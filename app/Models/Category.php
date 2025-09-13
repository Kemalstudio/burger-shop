<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Связь для получения дочерних категорий (подкатегорий)
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Связь для получения родительской категории
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Связь для получения всех товаров в этой категории
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}