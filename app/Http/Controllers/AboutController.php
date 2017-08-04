<?php

namespace HCWS\Http\Controllers;

use Illuminate\Http\Request;
use HCWS\Models\Stat;

class AboutController extends Controller
{
    public function index() {
        $latestStat = Stat::orderBy('date', 'desc')->first();
        $data = array('stat' => $latestStat);
        return view('about',$data);
    }
}
