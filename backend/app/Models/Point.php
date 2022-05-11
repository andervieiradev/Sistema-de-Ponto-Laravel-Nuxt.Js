<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $fillable = [
        'point_date',
    ];

    protected $cast = [
        'point_date' => 'datetime'
    ];


    protected function pointDate(): Attribute
    {
        return new Attribute(
            set: fn ($value) => $value,
            get: fn ($value) => Carbon::parse($value)->format('d/m/Y H:m:s'),
        );
    }

}
