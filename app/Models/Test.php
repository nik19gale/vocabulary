<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Word;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'word_id',
        'answer',
        'result',
    ];

    public function word()
    {
        return $this->belongsTo(Word::class);
    }
}
