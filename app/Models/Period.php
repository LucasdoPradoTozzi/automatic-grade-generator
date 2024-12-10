<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Period extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function module(): HasMany
    {
        return $this->hasMany(Module::class);
    }
}