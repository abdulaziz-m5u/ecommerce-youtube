<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $guarded = [];

     /**
	 * Define relationship with the Product
	 *
	 * @return void
	 */
	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
