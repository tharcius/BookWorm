<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = '';

    protected $fillable = [
        'name',
        'birthdate',
        'nationality',
    ];

    protected $casts = [
        'birthdate' => 'date:d/m/Y',
        'deleted_at' => 'datetime',
    ];

    protected function birthdate(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->format('d/m/Y'),
            set: fn (string $value) => Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d')
        );
    }
}
