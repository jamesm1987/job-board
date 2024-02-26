<?php

namespace App\Observers;

use App\Models\Job;
use Illuminate\Support\Str;

class JobObserver
{
    public function creating(Job $job): void
    {
        if (!isset($job->creator_id) && auth()->check()) {
            $job->creator_id = auth()->id();
        }

        // Set the slug based on the title if not already set
        if (!isset($job->slug)) {
            $job->slug = $this->generateUniqueSlug($job->title, $job->id);
        }
    }
    
    /**
     * Handle the Job "created" event.
     */
    public function created(Job $job): void
    {
    }

    public function updating(Job $job): void
    {
        // If the title is being updated, update the slug accordingly
        if ($job->isDirty('title')) {
            $job->slug = $this->generateUniqueSlug($job->title, $job->id);
        }
    }
    
    /**
     * Handle the Job "updated" event.
     */
    public function updated(Job $job): void
    {
        //
    }

    /**
     * Handle the Job "deleted" event.
     */
    public function deleted(Job $job): void
    {
        //
    }

    /**
     * Handle the Job "restored" event.
     */
    public function restored(Job $job): void
    {
        //
    }

    /**
     * Handle the Job "force deleted" event.
     */
    public function forceDeleted(Job $job): void
    {
        //
    }

    protected function generateUniqueSlug($title)
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $count = 1;

        while (Job::withTrashed()->where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
