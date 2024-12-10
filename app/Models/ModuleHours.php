<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ModuleHours extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function module(): BelongsToMany
    {
        return $this->belongsToMany(Module::class);
    }
}
