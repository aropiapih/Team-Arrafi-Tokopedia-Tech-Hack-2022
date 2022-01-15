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
            <h4 class="mt-3 ml-3 tx-medium text-truncate">Shopping List</h4>
            <form action="{{ route('shoppingList.store') }}" method="post">
                @csrf
                <div class="d-flex justify-content-between">
                    <input name='name_list'>
                    <button type="submit" class="btn pt-3"><i class="far fa-plus-square fa-2x"></i></button>
                </div>
            </form>            
        </div>
    </div>
    @foreach ($data as $d)
    <a href="/item-list" style="text-decoration: none; color: black;">
    <div class="card" style="margin-top: 30px">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h4 > {{ $d->name_list }} </h4>
                </div>
                <div class="ml-auto pt-1">
                    <form action="{{ route('shoppingList.delete') }}" method="post">
                        @csrf
                        <input name='shop_list_id' type="hidden" value="{{ $d->id }}">
                        <button type="submit" class="btn btn-danger float-right"><i class="fas fa-trash"></i></button>
                    </form>   
                </div>
            </div>
        </div>
    </div>
    </a>
    @endforeach
@endsection


@section('prescript')

@endsection

@section('script')

@endsection
