<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Part;
use App\Models\Test;

class Word extends Model
{
    use HasFactory;

    protected $fillable = [
        'alpha',
        'beta',
        'part_id',
        'tag_id',
        'score',
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function part()
    {
        return $this->belongsTo(Part::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }
}
