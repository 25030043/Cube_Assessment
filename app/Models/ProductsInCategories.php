<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\DevProjectData;

class ProductsInCategories extends Model
{
    use HasFactory;

    protected $table = 'productsincategories';

    public function category()
	{
		return $this->belongsTo(Category::class, 'category_id');
	}

	public function devProjectData()
	{
		return $this->belongsTo(DevProjectData::class, 'product_id');
	}


    // Rest of your model code...
}
