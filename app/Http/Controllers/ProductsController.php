<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Photo;
use Image;
use DB;
use File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('photo')->with('supplier')->orderBy('created_at','desc')->paginate(10);
        return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'supplier_id' => 'required|integer',
            'product_name' => 'required|max:255',
            'product_size' => 'required|max:255',
            'product_price' => 'required|numeric',
            'product_photo' => 'required'
        ]);
        
        try{
            # Uploading the image using Image Intervention
        
            $file = $request->file('product_photo');
            $photoRealPath = $file->getRealPath();
            $originalName = $file->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $file->extension();
            
            $newName = uniqid().$fileName.'.'.$extension;
            $path = public_path('images/products/');
           
            $pho = Image::make($photoRealPath);

            # end Uploading the image using Image Intervention

            # Start transaction
            DB::beginTransaction();

            $createdPhoto = Photo::create([
                'photo_url' => $newName 
            ]);
            
            $product = Product::create([
                'supplier_id' => $request->supplier_id,
                'product_name' => $request->product_name,
                'product_size' => $request->product_size,
                'product_price' => $request->product_price,
                'photo_id' => $createdPhoto->id,
            ]);
            
            if(!$createdPhoto || !$product){
                DB::rollBack();
            }else{
                $photo = $pho->orientate()->fit(600, 600)->save($path.$newName);
                DB::commit();
                return Product::where('id', $product->id)->with('photo')->with('supplier')->first();
            }
            
        }catch(Exception $err){
            return $err->message;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $product = Product::where('id', $id)->with('photo')->with('supplier')->first();
        return  view('/product-edit')->with(compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $product = Product::findOrFail($id);
        $photo = Photo::findOrFail($product->photo_id);
        $Photo_url = $photo->photo_url;
        try{
            
            DB::beginTransaction();
            $dProduct = $product->delete();
            $dPhoto = $photo->delete();
            if(!$dProduct || !$dPhoto){
                DB::rollBack();
            }else{ 
                File::delete(public_path('images/products/'.$Photo_url));
                DB::commit();
                return $id;
            }  
        }catch(Exception $err){
            return 'internal error 500';
        }
        
        
    }
}
