<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function period(): BelongsTo
    {
        return $this->belongsTo(Period::class);
    }

    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }

    public function moduleHours(): HasMany
    {
        return $this->hasMany(ModuleHours::class, 'module_id');
    }

    public function equivalences(): HasMany
    {
        return $this->hasMany(Equivalence::class, 'main_module_id');
    }

    public function equivalenceTo(): HasMany
    {
        return $this->hasMany(Equivalence::class, 'equivalence_module_id');
    }
}
