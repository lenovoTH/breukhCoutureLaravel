<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fournisseur extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
