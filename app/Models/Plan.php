<?php

namespace App\Models;

use App\Casts\PriceCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    const TABLE = 'plans';

    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'slug',
        'stripe_name',
        'stripe_product_id',
        'stripe_price_id',
        'price',
        'abbreviation',
    ];

    protected $casts = [
        'price' => PriceCast::class,
    ];

    /**
     * Use slug column always for model binding
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function slug(): string
    {
        return $this->slug;
    }

    public function stripeName(): string
    {
        return $this->stripe_name;
    }

    public function stripeProductId(): string
    {
        return $this->stripe_product_id;
    }

    public function stripePriceId(): string
    {
        return $this->stripe_price_id;
    }

    public function price(): string 
    {
        return '$' . number_format($this->price, 2);
    }

    public function abbreviation(): string 
    {
        return $this->abbreviation;
    }
}
