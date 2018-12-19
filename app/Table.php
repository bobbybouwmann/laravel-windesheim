<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Table extends Model
{
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
