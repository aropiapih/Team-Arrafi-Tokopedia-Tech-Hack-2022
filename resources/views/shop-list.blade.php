@extends('layouts.main')

@section('title')
Shopping List
@endsection

@section('prestyles')

@endsection

@section('styles')

@endsection

@section('contents')
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30" >
        <div class ="margin-top-100">
            <div class="d-flex justify-content-between">
                <h4 class="mt-3 ml-3 tx-medium text-truncate">Shopping List</h4>
                <a type="button" class="pt-3"><i class="far fa-plus-square fa-2x"></i></a>
            </div>
        </div>
    </div>
    @for ($i = 0; $i < 5 ;  $i++ )
    <div class="card" style="margin-top: 30px">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h4 > Shopping List Name </h4>
                </div>
                <div class="ml-auto pt-1">
                    <a type="button" class="float-right text-danger"><i class="fas fa-trash"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endfor
@endsection


@section('prescript')

@endsection

@section('script')

@endsection
