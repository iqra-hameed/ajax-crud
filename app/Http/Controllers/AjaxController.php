<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DataTables;

class AjaxController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $form = Product::latest()->get();
            return Datatables::of($form) ->addColumn('name', function($row){
                        return  $row->name;
                       })
                       ->addColumn('details', function($row){
                        return  $row->details;
                       })
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                            return $btn;
                    }) ->rawColumns(['action']) ->make(true);

       }
       return view('product');

    }

        public function store(Request $request)
    {
        Product::updateOrCreate(['id' => $request->product_id],
                ['name' => $request->name, 'details' => $request->details]);

        return response()->json(['success'=>'Product saved successfully.']);


    }

    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function destroy($id)
    {
        Product::find($id)->delete();

        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
