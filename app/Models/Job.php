<?php

namespace App\Models;

use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Job extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $with = ['tags'];

    protected $fillable = [
        'job_title',
        'job_location',
        'job_description',
        'company_name',
        'apply_url',
        'apply_email',
        'job_responspilty',
        'job_requirements',
        'job_color',
        'user_id'
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->shortAbsoluteDiffForHumans();
    }

    public function getImageAttribute(){

        return $this->getFirstMediaUrl('jobs');

    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class , 'jobs_tags' , 'jobs_id' , 'tags_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
