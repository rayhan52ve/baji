<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function tech_web_list_product()
    {
        return view('admin.product.index',[
            'product_types'=>ProductType::get()
        ]);

    }

    public function tech_web_store_product(Request $request)
    {
        // dd($request->all());
        ProductType::save_product($request);
        return back()->with('message','Product Added Successfully');

    }

    public function tech_web_edit_product($id)
    {
        return view('admin.product.edit',[
            'product_type'=>ProductType::find($id),
        ]);
    }

    public function tech_web_update_product(Request $request)
    {
        // dd($request->all());
        ProductType::update_product($request);
        return redirect()->route('list.product')->with('message','Product Updated Successfully');
    }

    public function tech_web_delete_product($id)
    {
        // dd($id);
        $product_type = ProductType::find($id);
        $product_type->delete();
        return back()->with('message','Product Deleted Successfully');
    }
}
