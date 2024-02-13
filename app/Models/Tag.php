<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Word;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'limit',
    ];

    public function words()
    {
        return $this->hasMany(Word::class);
    }
}
