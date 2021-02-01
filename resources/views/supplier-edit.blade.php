@extends('/layouts/app')

@section('content')

<div class="suppliers-container container">
    <a class="btn btn-primary mb-3" href="/supplier">Back</a>
        <p class="font-weight-bold">Edit {{$supplier->supplier_name}}</p>
    @if(session('success'))
       <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <div class="border p-2 p-md-5 mb-4">
        <form action="/supplier/{{$supplier->id}}" method="post">
            @method('patch')
            @csrf
            <div class="form-group">
                <label for="supplier_name">Supplier Name</label>
                <input 
                type="text" 
                class="form-control" 
                id="supplier_name" 
                name="supplier_name" 
                value="{{old('supplier_name', $supplier->supplier_name)}}">
                @error('supplier_name') <small class="text-danger">{{$message}}</small> @enderror
            </div>
            <button type="submit" class="btn btn-success">Save</button>
         </form>
    </div>
    
</div>

@endsection