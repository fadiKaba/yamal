@extends('/layouts/app')

@section('content')
    <div class="suppliers-container container">
        <p class="font-weight-bold">Suppliers</p>
        @if(session('success'))
           <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="border p-2 p-md-5 mb-4">
            <form action="/supplier" method="post">
                @csrf
                <div class="form-group">
                    <label for="supplier_name">Supplier Name</label>
                    <input required type="text" class="form-control" id="supplier_name" name="supplier_name" value="{{old('supplier_name')}}">
                    @error('supplier_name') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <button type="submit" class="btn btn-success">Add New Supplier</button>
             </form>
        </div>
        
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Edit</th>
                </tr>
            </thead>
            @foreach ($suppliers as $supplier)
            <tr>
                <td>{{$supplier->supplier_name}}</td>
                <td class="d-flex">
                    <a class="btn btn-link mr-2" href="/supplier/{{$supplier->id}}/edit">Edit</a>
                    <form action="" onsubmit="return confirm('Delete {{$supplier->supplier_name}} ?')">
                        <button  class="btn btn-link text-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        
    </div>
@endsection