<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['name'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
