<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Franchise extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class)->whereHas('roles', function($query) {
            $query->where('name', 'Franchisee');
        });
    }

    public function jobs()
    {
        return $this->hasManyThrough(Job::class, User::class, 'franchise_id', 'user_id');
    }
}
