<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ProductVariants;

class DevProjectData extends Model
{
    use HasFactory;

    protected $table = 'devprojectdata';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'productsincategories', 'product_id', 'category_id');
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
