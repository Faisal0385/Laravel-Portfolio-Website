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
    function ServiceDelete(Request $req){

    	$id = $req->input('id');

    	$ServiceDelete = ServicesModel::where('id','=',$id)->delete();

    	if($ServiceDelete == true){

    		return 1;

    	}else{

    		return 0;

    	}

    }

}
