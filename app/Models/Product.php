<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Атрибуты, которые можно массово назначать.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id',
        'weight',
        'default_ingredients',
        'is_popular',
        'is_new',
    ];

    /**
     * Категория, к которой принадлежит товар.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Добавки, которые доступны для этого товара.
     */
    public function additives()
    {
        return $this->belongsToMany(Additive::class);
    }
}