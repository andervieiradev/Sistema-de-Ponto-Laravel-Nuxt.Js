<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'document',
        'birthday',
        'job_position',
        'cep',
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'country',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday' => 'datetime',
    ];

    protected $appends = ['age'];

    protected function password(): Attribute
    {
        return new Attribute(
            set: fn ($value) => bcrypt($value),
        );
    }

    protected function document(): Attribute
    {
        return new Attribute(
            set: fn ($value) => preg_replace("/\D/", '', $value),
            get: fn ($value) =>  preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $value),
        );
    }

    protected function cep(): Attribute
    {
        return new Attribute(
            set: fn ($value) => preg_replace("/\D/", '', $value),
            get: fn ($value) =>  preg_replace("/(\d{5})(\d{3})/", "\$1-\$2", $value),
        );
    }

    protected function birthday(): Attribute
    {
        return new Attribute(
            set: fn ($value) => Carbon::createFromFormat('d/m/Y', $value)->startOfDay(),
            get: fn ($value) => Carbon::parse($value)->format('d/m/Y'),
        );
    }

    protected function age(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => Carbon::parse($attributes['birthday'])->diff(Carbon::now())->format('%y anos, %m meses e %d dias'),
        );
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function point()
    {
        return $this->hasMany(Point::class);
    }

}
