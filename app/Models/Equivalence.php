<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equivalence extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mainModule(): BelongsTo
    {
        return $this->belongsTo(Module::class, 'main_module_id');
    }

    public function equivalenceModule(): BelongsTo
    {
        return $this->belongsTo(Module::class, 'equivalence_module_id');
    }
}
