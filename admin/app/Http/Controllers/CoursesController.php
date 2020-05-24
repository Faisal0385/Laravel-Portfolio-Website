<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoursesModel;

class CoursesController extends Controller
{
    //
    function CoursesIndex(){

    	return view('Courses');

    }

    //For coursesData
    function getCoursesData(){

    	$CoursesData = json_decode(CoursesModel::all());

    	return $CoursesData;

    }

    //For Course Delete
    function CourseDelete(Request $req){

        $id = $req->input('id');

        $CourseDelete = CoursesModel::where('id','=',$id)->delete();

        if($CourseDelete == true){

            return 1;

        }else{

            return 0;

        }

    }

    //For Add Service
    function CourseAdd(Request $req){

        $CourseNameId   = $req->input('CourseNameId');
        $CourseDesId    = $req->input('CourseDesId');
        $CourseFeeId    = $req->input('CourseFeeId');
        $CourseEnrollId = $req->input('CourseEnrollId');
        $CourseClassId  = $req->input('CourseClassId');
        $CourseLinkId   = $req->input('CourseLinkId');
        $CourseImgId    = $req->input('CourseImgId');


        $CourseAdd = CoursesModel::insert(
            [
                'course_name'        => $CourseNameId, 
                'course_des'         => $CourseDesId, 
                'course_fee'         => $CourseFeeId,
                'course_totalenroll' => $CourseEnrollId, 
                'course_totalclass'  => $CourseClassId, 
                'course_link'        => $CourseLinkId,
                'course_img'         => $CourseImgId
            ]);

        if($CourseAdd == true){

            return 1;

        }else{

            return 0;

        }

    }




}
