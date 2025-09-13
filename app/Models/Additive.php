<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Additive extends Model
{
    use HasFactory;

    /**
     * Атрибуты, которые можно массово назначать.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'image',
    ];

    /**
     * Продукты, к которым может принадлежать эта добавка.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}