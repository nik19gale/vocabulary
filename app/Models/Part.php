<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Word;

class Part extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
    ];

    public function words()
    {
        return $this->hasMany(Word::class);
    }
}
