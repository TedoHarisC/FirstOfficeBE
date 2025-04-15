<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class OfficeSpace extends Model
{
    use HasFactory, SoftDeletes;

    // Fillable ini adalah data yang bisa diisi oleh user
    protected $fillable = [
        'name',
        'thumbnail',
        'is_open',
        'is_full_booked',
        'price',
        'duration',
        'address',
        'about',
        'slug',
        'city_id'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value; // tedo office center
        $this->attributes['slug'] = Str::slug($value); // tedo-office-center
    }

    // Function untuk melihat data kantor ini dimiliki oleh kota yang mana makanya menggunakan belongsTo
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(OfficeSpacePhoto::class);
    }

    public function benefits(): HasMany
    {
        return $this->hasMany(OfficeSpaceBenefit::class);
    }
}
