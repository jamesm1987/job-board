<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{


    public function __invoke(Area $area)
    {
        $jobs = $area->jobs()->orderby('updated_at','desc')->paginate(10);

        return view('area.jobs', [
            'jobs' => $jobs
        ]);
    }
}
