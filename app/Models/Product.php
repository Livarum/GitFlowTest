<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    protected $fillable = ['name', 'description', 'price', 'provider_id', 'type_id', 'container_id'];
    // Additional model configurations, relationships, etc., can be added here
}

