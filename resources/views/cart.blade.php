@extends('layouts.main')

@section('title')
    Cart
@endsection

@section('prestyles')

@endsection

@section('styles')
    <style>
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }
    </style>
@endsection

@section('contents')
    <section class="h-100 h-custom">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" class="h5">My Cart</th>
                                <th scope="col"></th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ( $data as $d )
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img src="{{asset('images/Baju.jpeg')}}" class="img-fluid rounded-3"
                                                 style="width: 120px;" alt="Book">
                                            <div class="flex-column ms-4">
                                                <p class="mb-2">{{ $d->name }}</p>
                                                <p class="mb-0">{{ $d->description }}</p>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="align-middle">

                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex flex-row">
                                            <button class="btn btn-link px-2 stepdown-btn">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <input id="form1" min="0" name="quantity" value="1" type="number"
                                                   class="form-control form-control-sm" style="width: 50px;"/>

                                            <button class="btn btn-link px-2 stepup-btn">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <p class="mb-0" id="subtotal" style="font-weight: 500;">
                                            Rp {{ number_format($d->price, 0, ",", ".") }}</p>
                                        <input type="hidden" value="{{$d->price}}" id="unit_price"/>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
                        <div class="card-body p-4">
                        <form action="{{ route('order') }}" method="post">
                        @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-4 col-xl-6">
                                    <div class="row">
                                        <div class="col-12 col-xl-6">
                                            <div class="form-outline mb-4 mb-xl-5">
                                                <label class="form-label" for="typeName">Name</label>
                                                <input type="text" id="name" name="user_id" class="form-control form-control-lg"
                                                       placeholder="Recipient name"/>

                                                <input type="hidden" name="user_id" class="form-control form-control-lg"
                                                                                                       placeholder="Recipient name" value="{{$user->id}}"/>

                                            </div>

                                            <div class="form-outline mb-4 mb-xl-5">
                                                <label class="form-label" for="typeExp">Shipping Adress</label>
                                                <input type="text" id="typeExp" name="shipping_address" class="form-control form-control-lg"
                                                       placeholder="Address"
                                                />
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-4 col-xl-3">

                                    <div class="d-flex justify-content-between" style="font-weight: 500;">
                                        <p class="mb-2">Subtotal</p>
                                        <p class="mb-2" id="products_subtotal">Rp 200.000</p>
                                    </div>

                                    <div class="d-flex justify-content-between" style="font-weight: 500;">
                                        <p class="mb-0">Shipping</p>
                                        <p class="mb-0">Rp 20.000,00</p>
                                    </div>

                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                                        <p class="mb-2">Total</p>
                                        <p class="mb-2" id="total">Rp. 220.000</p>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block btn-lg">
                                    <input type="hidden" name="amount" id="amount">
                                        <div class="d-flex justify-content-between">
                                            <span>Checkout</span>
                                        </div>
                                    </button>

                                </div>
                            </div>
                        </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection


@section('prescript')

@endsection

@section('script')
    <script>
        $('.stepup-btn').click(function () {
            this.parentNode.querySelector('input[type=number]').stepUp();
            this.parentNode.parentNode.parentNode.querySelector('p#subtotal').innerHTML = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(this.parentNode.querySelector('input[type=number]').value * this.parentNode.parentNode.parentNode.querySelector('input#unit_price').value)

            updatePrices(this)
        })

        $('.stepdown-btn').click(function () {
            this.parentNode.querySelector('input[type=number]').stepDown();
            this.parentNode.parentNode.parentNode.querySelector('p#subtotal').innerHTML = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(this.parentNode.querySelector('input[type=number]').value * this.parentNode.parentNode.parentNode.querySelector('input#unit_price').value)

            updatePrices(this)
        })

        function updatePrices(el) {
            let total = 0;
            el.parentNode.parentNode.parentNode.parentNode.querySelectorAll('tr').forEach(function (elem) {
                total += elem.querySelector('input#unit_price').value * elem.querySelector('input[type=number]').value
            })

            $('p#products_subtotal').html(new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(total)
            )
            $('p#total').html(new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(total + 20000)
            )
            $('#amount').val(total+20000)
        }

        $(document).ready(function () {
            document.querySelectorAll('.stepdown-btn').forEach(function (elem) {
                updatePrices(elem)
            })
        })
    </script>
@endsection
