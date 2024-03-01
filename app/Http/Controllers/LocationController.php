<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{


    public function __invoke(Location $location)
    {
        $jobs = $location->jobs()->orderby('updated_at','desc')->paginate(10);

        return view('location.jobs', [
            'jobs' => $jobs
        ]);
    }
}
