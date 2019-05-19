<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Model\Product;
use App\Model\Category;
use Form;

class JsonController extends Controller
{

	private $uri = 'products';

    public function product()
    {       
        // return Datatables::of(Product::query())->make(true);
        // return datatables()->of(Product::all())->toJson(); 

        $products = Product::select(['id','category_id', 'name', 'price', 'status', 'created_at']);

        return Datatables::of($products)
            ->addColumn('action', function ($product) {
                // $tag .= "<a href=".route($this->uri.'.edit',$index->id)." class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i> Edit</a>";
                // $tag = "<a href=".route($this->uri.'.edit', $product->id)." class='btn btn-sm btn-primary'>Edit</a>";

      //           $tag .= "<form method="post" action="{{ route('products.destroy', $product->id) }}">";
      //           $tag .= "<a href=".route($this->uri.'.edit', $product->id)." class='btn btn-sm btn-primary'>Edit</a>";

      //           $tag = "<form method="post" action=".route('.destroy', $product->id).">
						// 	<a class="btn btn-sm btn-primary" href=".route($this->uri.'.edit', $product->id).">Edit</a>
						// 	@csrf
						// 	@method('DELETE')
						// 	<button class="btn btn-sm btn-danger" type="submit">Delete</button>
						// </form>";

				$tag = Form::open(array("url" => route($this->uri.'.destroy',$product->id), "method" => "DELETE"));
                $tag .= "<a href=".route($this->uri.'.edit',$product->id)." class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i> Edit</a>";
                $tag .= " <button type='submit' class='delete btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</button>";
                $tag .= Form::close();

                return $tag;
            })
            ->make(true);    
    }

}
