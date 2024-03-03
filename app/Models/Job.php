<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

use App\Enum\JobHours;
use App\Enum\JobTimeOfDay;

class Job extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'title',
        'area_id',
        'creator_id',
        'hours',
        'time_of_day',
        'location',
        'wage',
        'contact_number',
        'contact_email',
        'description',
    ];

    protected $casts = [
        'hours' => JobHours::class,
        'time_of_day' => JobTimeOfDay::class
      ];
        
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
