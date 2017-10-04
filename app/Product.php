<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Seller;
use App\Category;
use App\Transaction;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Transformers\ProductTransformer;

class Product extends Model
{
	use SoftDeletes;

    public $transformer = ProductTransformer::class;
    const UNAVAILABLE_PRODUCT = 'unavailable';
    const AVAILABLE_PRODUCT = 'available';

    protected $dates = ['deleted_at'];
    protected $fillable = [
      'name',
      'description',
      'quantity',
      'status',
      'image',
      'seller_id'
    ];

    protected $hidden = [
      'pivot'
    ];

    public function isAvailable ()
    {
        return $this->status == Product::AVAILABLE_PRODUCT;
    }

    public function seller ()
    {
        return $this->belongsTo(Seller::class);
    }

    public function transactions ()
    {
        return $this->hasMany(Transaction::class);
    }

    public function categories ()
    {
        return $this->belongsToMany(Category::class);
    }
}
