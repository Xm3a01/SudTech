<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function jobs()
    {
        return $this->belongsToMany(Job::class , 'jobs_tags' , 'jobs_ids' , 'tags_ids');
    }
}
