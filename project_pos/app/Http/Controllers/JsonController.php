<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Model\Product;
use App\Model\Category;
use App\Model\Payment;
use App\Model\Order;
use App\User;
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

    private $uri2 = 'categories';

    public function category()
    {       

        $categories = Category::select(['id', 'name', 'created_at']);

        return Datatables::of($categories)
            ->addColumn('action', function ($category) {

                $tag = Form::open(array("url" => route($this->uri2.'.destroy',$category->id), "method" => "DELETE"));
                $tag .= "<a href=".route($this->uri2.'.edit',$category->id)." class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i> Edit</a>";
                $tag .= " <button type='submit' class='delete btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</button>";
                $tag .= Form::close();

                return $tag;
            })
            ->make(true);    
    }

    private $uri3 = 'payments';

    public function payment()
    {       

        $categories = Payment::select(['id', 'name', 'created_at']);

        return Datatables::of($categories)
            ->addColumn('action', function ($payment) {

                $tag = Form::open(array("url" => route($this->uri3.'.destroy',$payment->id), "method" => "DELETE"));
                $tag .= "<a href=".route($this->uri3.'.edit',$payment->id)." class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i> Edit</a>";
                $tag .= " <button type='submit' class='delete btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</button>";
                $tag .= Form::close();

                return $tag;
            })
            ->make(true);    
    }

    private $uri4 = 'users';

    public function user()
    {       

        $categories = User::select(['id', 'name', 'email', 'created_at']);

        return Datatables::of($categories)
            ->addColumn('action', function ($user) {

                $tag = Form::open(array("url" => route($this->uri4.'.destroy',$user->id), "method" => "DELETE"));
                $tag .= "<a href=".route($this->uri4.'.edit',$user->id)." class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i> Edit</a>";
                $tag .= " <button type='submit' class='delete btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</button>";
                $tag .= Form::close();

                return $tag;
            })
            ->make(true);    
    }

    private $uri5 = 'orders';

    public function order()
    {       

        $categories = Order::select(['id', 'table_number', 'total', 'payment_id', 'user_id', 'created_at']);

        return Datatables::of($categories)
            // ->addColumn('action', function ($order) {

            //     $tag = Form::open(array("url" => route($this->uri5.'.destroy',$order->id), "method" => "DELETE"));
            //     $tag .= "<a href=".route($this->uri5.'.edit',$order->id)." class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i> Edit</a>";
            //     $tag .= " <button type='submit' class='delete btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</button>";
            //     $tag .= Form::close();

            //     return $tag;
            // })
            ->make(true);    
    }

}
