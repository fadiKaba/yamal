@extends('/layouts/app')

@section('content')
    @if(session('success'))
    <div class="container">
        <div class="alert alert-success">{{session('success')}}</div>
    </div>
    @endif
    <p class="text-center">Edit {{$product->product_name}}</p>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="/images/products/{{$product->photo->photo_url}}" class="card-img-top" alt="{{$product->productName}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->supplier->supplier_name}}</h5>
                        <p class="card-text">{{$product->product_name}}</p>
                        <p class="card-text">{{$product->product_size}}</p>
                        <p class="card-text font-weight-bold">{{$product->product_price}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <form action="/product/{{$product->id}}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="supplier_id">Supplier</label>
                        <select class="form-control" name="supplier_id" id="supplier_id">
                            <option value="{{$product->supplier->id}}">{{$product->supplier->supplier_name}}</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                            @endforeach
                        </select>
                        @error('supplier_id') 
                        <small>{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="product_name" id="product_name" value="{{old('product_name',$product->product_name)}}">
                        @error('product_name') 
                        <small>{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Size</label>
                        <input type="text" class="form-control" name="product_size" id="product_size" value="{{old('product_size',$product->product_size)}}">
                        @error('product_size') 
                        <small>{{$message}}</small>
                        @enderror
                    </div>
                    <label for="">Price</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="product_price" id="product_price" value="{{old('product_price',$product->product_price)}}">
                        <div class="input-group-append">
                            <span class="input-group-text">$</span>
                            <span class="input-group-text">0.00</span>
                        </div>
                    </div>
                    @error('product_price') 
                        <small>{{$message}}</small>
                    @enderror
                    <div class="form-group mt-3">
                        <label for="product_photo">Product photo</label>
                        <input type="file" class="form-control" name="product_photo" id="product_photo">
                    </div>
                    @error('product_price') 
                        <small>{{$message}}</small>
                    @enderror
                    <button type="submit" class="btn btn-secondary">Apply & Save</button>
                </form>
            </div>   
        </div>
    </div>
    
    
@endsection