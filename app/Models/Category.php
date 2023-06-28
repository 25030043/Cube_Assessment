<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DevProjectData;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function products()
	{
		return $this->belongsToMany(DevProjectData::class, 'productsincategories', 'category_id', 'product_id');
	}



}
