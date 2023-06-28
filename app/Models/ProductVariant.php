<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DevProjectData;


class ProductVariant extends Model
{
    use HasFactory;

    protected $table = 'productvariants';

    public function product()
    {
        return $this->belongsTo(DevProjectData::class, 'product_id', 'id');
    }
}
