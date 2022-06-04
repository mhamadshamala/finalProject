<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

         // $tasks = DB::table('tasks')->orderBy('name')->get();
         $products = Product::get();
         $contacts = Contact::all();

       // dd($tasks);
        return view ('admin.products.index',[
            'products' => $products,
            'contacts' => $contacts
        ]);
    }

    public function create(Request $request){
        $contacts = Contact::get();
        $categories = Category::get();
        return view('admin.products.create', [
            'contacts' => $contacts,
            'categories' => $categories
        ]);
}

public function store(Request $request){

    $product = new Product();
    $product->name = $request->product_name;
    $product->price = $request->product_price;
    $product->quantity = $request->product_qty;
    $product->description = $request->product_description;
    $product->category_id = $request->category_id;
    if($request->product_image){
      $image = time().'.'.$request->product_image->extension();
      $request->product_image->move(public_path('images'),$image);
      $product->image = $image;
    }

    $product->save();

    return redirect()->back();
}

public function delete($id){

    $product = Product::find($id);
    $product->delete();
    return redirect()->back();
}


public function edit(Request $request, $id){
    $contacts = Contact::all();
    $product = Product::find($id);
    // dd($product);
     return view('admin.products.update',compact('product','contacts'));
 }

 public function update(Request $request, $id){



    $product =Product::find($id);

    $product->name = $request->product_name;
    $product->price = $request->product_price;
    $product->quantity = $request->product_quantity;
    $product->description = $request->product_description;
    $product->category_id = $request->category_id;
    if($request->product_image){
      $image = time().'.'.$request->product_image->extension();
      $request->product_image->move(public_path('images'),$image);
      $product->image = $image;
    }

    $product->save();

    // if ($request->product_image) {
    //     $imageName = time() . '.' . $request->product_image->extension();
    //     $request->product_image->move(public_path('images'), $imageName);
    //     $request->product_image = $imageName;
    // } else {
    //     $request->product_image;
    // }
    //  Product::where('id',$request->id)->update([
    //      'name' => $request->product_name,
    //      'description' => $request->product_description,
    //      'price' => $request->product_price,
    //      'quantity' => $request->product_quantity,
    //      'image' => $request->product_image,
    //      'updated_at' => now() ,
    //      'created_at' => now()
    //  ]);

    return redirect()->to('admin/products');
 }
}
