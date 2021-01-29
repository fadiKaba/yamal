@extends('/layouts/app')

@section('content')
    <div class="about-container p-2 p-md-5">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mb-4 mb-md-5"><span>About Us</span></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus suscipit similique atque debitis 
                    reprehenderit error tenetur, pariatur porro, commodi alias laborum! Nam officiis incidunt nemo deleniti 
                    ipsa. Porro perferendis nisi corporis aut a, praesentium consectetur tempora beatae, fugit non aliquid 
                    distinctio enim deleniti velit ex, temporibus sint. Praesentium accusamus sapiente rerum dolores dicta 
                    excepturi necessitatibus tenetur voluptas ipsum architecto doloremque atque nulla blanditiis, reiciendis 
                    de! At iusto maxime aliquid fuga.
                </p>
            </div>
            <div class="col-md-6 photos">
                <div>
                    <img src="{{asset('images/photo1.jpg')}}" width="200px" alt="photo">
                     <p>Jhon Smith</p>
                </div>
                <div>
                    <img src="{{asset('images/photo2.jpg')}}" width="200px" alt="photo">
                     <p>Jhon Smith</p>
                </div>
            </div>
        </div>
    </div>
@endsection