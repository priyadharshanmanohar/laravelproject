<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index() {
        $id = $_POST['id'];
        if($id==1){
        $msg = "Uploaded Succesfully";}
        else{
            $msg = "Upload Failed";
        }
        return response()->json(array('msg'=> $msg), 200);
     }
}
