@extends('layouts.main')

@section('title')
Homepage
@endsection

@section('prestyles')

@endsection

@section('styles')

@endsection

@section('contents')

<!--
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
   </form><form class="d-flex"> -->
    <div class="collection-list mt-4 row gx-0 gy-3">
        @for ($i = 0; $i < 10 ;  $i++ )
        <div class="col-md-3 col-lg-2 col-xl-3 p-2 w-50">
            <div class="collection-img position-relative">
                <img src = "{{asset('images/Baju.jpeg')}}" class="w-100">
            </div>
           <div class="text-center" >
                <div class = "rating">
                    <span class ="text-primary"> <i class="fas fa-star"></i> </span>
                    <span class ="text-primary"> <i class="fas fa-star"></i> </span>
                    <span class ="text-primary"> <i class="fas fa-star"></i> </span>
                    <span class ="text-primary"> <i class="fas fa-star"></i> </span>
                    <span class ="text-primary"> <i class="fas fa-star"></i> </span>
                </div>
                <p class = "text-capitalize my-1" > gray shirt </p>
                <span class = "fw-bold"> Rp. 100.000 </span><br>
                    <form action="/cart" style="display : inline;">
                        <button class="btn btn-primary"> Add to cart </button>
                    </form>
                    <form action="/order" style="display : inline;">
                        <button class="btn btn-outline-success"> Buy </button>
                    </form>

            </div>
        </div>
        @endfor

    </div>
</div>
@endsection


@section('prescript')

@endsection

@section('script')

@endsection
