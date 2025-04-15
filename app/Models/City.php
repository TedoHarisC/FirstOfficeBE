<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'photo',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value; // tedo office center
        $this->attributes['slug'] = Str::slug($value); // tedo-office-center
    }

    // Karena relasi nya one to many dengan office space (Maka nama prural officeSpaces)
    public function officeSpaces(): HasMany
    {
        return $this->hasMany(OfficeSpace::class);
    }
}
