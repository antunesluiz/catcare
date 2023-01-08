<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'breed',
        'birth',
        'weight',
        'picture',
        'is_favorite'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birth' => 'datetime:d-m-Y'
    ];

    /**
     * The attributes that should be date.
     *
     * @var array<string, string>
     */
    protected $dates = [
        'birth'
    ];

    /**
     * The attributes that should be appended.
     *
     * @var array<string, string>
     */
    protected $appends = [
        'age'
    ];

    /**
     * Get age attribute from birthdate
     */
    public function getAgeAttribute(): string
    {
        return Carbon::parse($this->attributes['birth'])->diff(Carbon::now())->format('%y anos e %m meses');
    }
}
