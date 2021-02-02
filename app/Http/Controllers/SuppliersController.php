<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $suppliers = Supplier::orderBy('created_at', 'desc')->get();
        return view('/suppliers')->with(compact('suppliers'));
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
       $re =  $request->validate([
            'supplier_name' => 'required|max:255|unique:suppliers'
        ]);

        Supplier::firstOrCreate($re);

        return redirect()->back()->with('success', 'Saved');
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
        $supplier = Supplier::findOrFail($id);
        return view('/supplier-edit')->with(compact('supplier'));
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
        $supplier = Supplier::findOrFail($id);
        $request->validate([
            'supplier_name' => 'required|max:255|unique:suppliers,supplier_name,'.$supplier->id
        ]);
     

        $supplier->update([
            'supplier_name' => $request->supplier_name
        ]);

        return redirect()->back()->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->back()->with('success', 'Deleted succsessfully');
    }

    public function sendSuppliers(){
        $suppliers = Supplier::all();
        return $suppliers;
    }
}
