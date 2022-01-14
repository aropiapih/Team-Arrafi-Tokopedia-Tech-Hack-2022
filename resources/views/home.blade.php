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
        @foreach ($data as $d)
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
                <p class = "text-capitalize my-1" > {{ $d->name }} </p>
                <span class = "fw-bold"> Rp {{ number_format($d->price, 0, ",", ".") }} </span><br>
                    <form action="/cart" style="display : inline;">
                        <button class="btn btn-primary"> Add to cart </button>
                    </form>
                    <form action="/cart" style="display : inline;">
                        <button class="btn btn-outline-success"> Buy </button>
                    </form>

            </div>
        </div>
        @endforeach

    </div>
</div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Spending Alert</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>You have spent a lot of money. Make a careful financial plan. Do you want to set your spending limit?</p>
                <p class="text-secondary"><small>If you agree, we'll warn you when you spend more than your limit.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>

@endsection


@section('prescript')

@endsection

@section('script')
<script>
$(document).ready(function() {
    $("#myModal").modal("show");
});

</script>
@endsection
