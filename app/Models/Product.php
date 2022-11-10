<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'brand'
    ];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['created_at', 'updated_at'];

	protected function getDetailsAttribute($value)
	{
		return json_decode($value);
	}

	public function setDetailsAttribute($value)
	{
		$this->attributes['details'] = json_encode($value);
	}

	/**
	 * Get the ProductVariants for the Product.
	 */
	public function variants()
	{
		return $this->hasMany(ProductVariant::class);
	}
}
