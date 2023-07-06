<?php

namespace App\Models;

use App\Traits\ModelHelpers;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use function Illuminate\Events\queueable;

class User extends Authenticatable
{
    use Billable;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use ModelHelpers;

    const DEFAULT = 1;
    const MODERATOR = 2;
    const WRITER = 3;
    const ADMIN = 4;
    const SUPERADMIN = 5;

    const TABLE = 'users';

    protected $table = self::TABLE;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'line1',
        'line2',
        'city',
        'state',
        'country',
        'postal_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function emailAddress(): string
    {
        return $this->email;
    }

    public function type(): int
    {
        return (int) $this->type;
    }

    public function lineOne(): string|null 
    {
        return $this->line1;
    }

    public function lineTwo(): string|null
    {
        return $this->line2;
    }

    public function country(): string|null
    {
        return $this->country;
    }

    public function city(): string|null
    {
        return $this->city;
    }

    public function state(): string|null
    {
        return $this->state;
    }

    public function postalCode(): string|null
    {
        return $this->postal_code;
    }

    public function isModerator(): bool
    {
        return $this->type() === self::MODERATOR;
    }

    public function isWriter(): bool
    {
        return $this->type() === self::WRITER;
    }

    public function isAdmin(): bool
    {
        return $this->type() === self::ADMIN;
    }

    public function isSuperAdmin(): bool
    {
        return $this->type() === self::SUPERADMIN;
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        return $this->postRelation;
    }

    public function postRelation(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    /**
     * Sync the customer information to stripe 
     * whenever there is an update on the model
     *
     * @return void
     */
    protected static function booted(): void
    {
        static::updated(queueable(function (User $user) {
            if($user->hasStripeId()) {
                $user->syncStripeCustomerDetails();
            }
        }));
    }

    public function stripeAddress()
    {
        return [
            'line1' => $this->lineOne(),
            'line2' => $this->lineTwo(),
            'city' => $this->city(),
            'state' => $this->state(),
            'country' => $this->country(),
            'postal_code' => $this->postalCode(),
        ];
    }
}
