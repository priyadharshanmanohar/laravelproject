<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ImportController extends Controller
{
    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'csv_file' => 'required|file'
        ]);
      
        $path = $request->file('csv_file')->getRealPath();
        $csv_data = array_map('str_getcsv', file($path));
        $product = new Product;
        $ctr=0;
        foreach($csv_data as $csv)
        {   if($ctr>0){
            $product = new Product;
            $product->title = $csv[0];
            $product->description=$csv[1];
            $product->product_price=$csv[2];
            $product->barcode=$csv[3];
            $product->base_product_id=$csv[4];
            $product->product_type=$csv[5];
            $product->save();
            $ctr=$ctr+1;
        }
        $ctr++;
        }
        return redirect()->back()->with('message', 'Uploaded!!!');
        //return view('welcome2',['message'=>'Uploaded Succesfully']);
   
        
        
}
public function display()
{
    

    $product_values = Product::all();
    return view('display',['users'=>$product_values]);
}
}
