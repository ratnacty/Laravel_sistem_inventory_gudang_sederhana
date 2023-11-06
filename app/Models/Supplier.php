<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';

    protected $guarded = [];


   /**
         * Get all of the comments for the Supplier
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function product(): HasMany
        {
            return $this->hasMany(Product::class);
        }
    
}
