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
                <h4 class="mt-3 ml-3 tx-medium text-truncate">Nama Shopping List</h4>
                <form action="{{ route('itemList.store', $id) }}" method="post">
                    @csrf
                    <div class="d-flex justify-content-between">
                        <input type="hidden" value="{{$id}}" name="list_id">
                        <input name="name_item">
                        <button type="submit" class="btn pt-3"><i class="far fa-plus-square fa-2x"></i></button>
                    </div>
                </form>    
        </div>
    </div>
    @foreach ($data as $d)
    <div class="card" style="margin-top: 30px">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="ml-auto pt-3">
                    <form action="{{ route('itemList.delete', $id) }}" method="post">
                        @csrf
                        <input name='item_list_id' type="hidden" value="{{ $d->id }}">
                        <button type="submit" class="btn btn-danger float-right"><i class="fas fa-trash"></i></button>
                    </form>  
                </div>
                <div class="">
                    <h4 > {{$d->name_item}} </h4>
                    <p> {{$d->lower_price}} - {{$d->upper_price}} </p>
                </div>
                <div class="ml-auto pt-3">
                    <form action="{{ route('search') }}" method="GET" >
                    @csrf
                        <input type="hidden" value="Durable" name="name" >
                        <button type="submit" class="btn pt-1 text-primary"><i class="fas fa-search fa-2x"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection


@section('prescript')

@endsection

@section('script')

@endsection
