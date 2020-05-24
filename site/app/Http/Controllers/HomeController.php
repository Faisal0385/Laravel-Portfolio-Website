<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;
use App\ServicesModel;
use App\CoursesModel;

class HomeController extends Controller
{
    //
    function HomeIndex(){

        // Ip Get
        $UserIP = $_SERVER['REMOTE_ADDR'];

        // Date Time
        date_default_timezone_set("Asia/Dhaka");
        $timeDate = date("Y-m-d h:i:sa");

        VisitorModel::insert(['ip_address' => $UserIP, 'visit_time' => $timeDate ]);

        $ServicesData = ServicesModel::all();
        $CoursesData  = CoursesModel::all();

        return view('Home',['ServicesData' => $ServicesData, 'CoursesData' => $CoursesData]);
        
    }
}
