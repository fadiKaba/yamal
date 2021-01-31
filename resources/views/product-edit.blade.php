@extends('/layouts/app')

@section('content')

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
                <form action="">
                    <div class="form-group">
                        <label for="">Supplier</label>
                        <select class="form-control" name="" id="">
                            <option value="">B</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="product_name" id="product_name" value="{{old('product_name',$product->product_name)}}">
                    </div>
                    <div class="form-group">
                        <label for="">Size</label>
                        <input type="text" class="form-control" name="product_size" id="product_size" value="{{old('product_size',$product->product_size)}}">
                    </div>
                    <label for="">Price</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="product_price" id="product_price" value="{{old('product_price',$product->product_price)}}">
                        <div class="input-group-append">
                            <span class="input-group-text">$</span>
                            <span class="input-group-text">0.00</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Product photo</label>
                        <input type="file" class="form-control" name="product_photo" id="product_photo">
                    </div>
                    <button type="submit" class="btn btn-secondary">Apply & Save</button>
                </form>
            </div>   
        </div>
    </div>
    
    
@endsection