<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServicesModel;

class ServicesController extends Controller
{
    
    //ServicesIndex
    // function ServicesIndex(){

    // 	$ServicesData =  json_decode(ServicesModel::all());

    //     return view('services',['ServicesData' => $ServicesData]);
    // }

	//For view
    function ServicesIndex(){

    	return view('Services');

    }


    //For servicesData
    function getServiceData(){

    	$ServicesData = json_decode(ServicesModel::all());

    	return $ServicesData;

    }

    //For ServiceDelete
    function getServicesSingleData(Request $req){

    	$id = $req->input('id');

    	$ServiceDelete = ServicesModel::where('id','=',$id)->get();

    	if($ServiceDelete == true){

    		return $ServiceDelete;

    	}

    }


    //For ServiceDelete
    function ServiceDelete(Request $req){

        $id = $req->input('id');

        $ServiceDelete = ServicesModel::where('id','=',$id)->delete();

        if($ServiceDelete == true){

            return 1;

        }else{

            return 0;

        }

    }



    //For ServiceEdit
    function ServiceEdit(Request $req){

        $id = $req->input('id');
        $service_name = $req->input('service_name');
        $service_des  = $req->input('service_des');
        $service_img  = $req->input('service_img');

        $ServiceUpdate = ServicesModel::where('id','=',$id)->update(['service_name' => $service_name, 'service_des'  => $service_des, 'service_img'  => $service_img ]);

        if($ServiceUpdate == true){

            return 1;

        }else{

            return 0;

        }

    }
    
    //For Add Service
    function ServiceAdd(Request $req){

        $service_name = $req->input('service_name');
        $service_des  = $req->input('service_des');
        $service_img  = $req->input('service_img');

        $ServiceAdd = ServicesModel::insert(['service_name' => $service_name, 'service_des'  => $service_des, 'service_img'  => $service_img ]);

        if($ServiceAdd == true){

            return 1;

        }else{

            return 0;

        }

    }


}
