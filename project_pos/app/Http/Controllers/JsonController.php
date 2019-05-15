<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Model\Product;
use App\Model\Category;

class JsonController extends Controller
{

    public function product()
    {       
        // return Datatables::of(Product::query())->make(true);
        return datatables()->of(Product::all())->toJson();      
    }

}
