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
             @for($i = 0; $i < 2; $i++)
               <tr>
                 <th scope="row">
                   <div class="d-flex align-items-center">
                     <img src="{{asset('images/Baju.jpeg')}}" class="img-fluid rounded-3" style="width: 120px;" alt="Book">
                     <div class="flex-column ms-4">
                       <p class="mb-2">Thinking, Fast and Slow</p>
                       <p class="mb-0">Daniel Kahneman</p>
                     </div>
                   </div>
                 </th>
                 <td class="align-middle">

                 </td>
                 <td class="align-middle">
                   <div class="d-flex flex-row">
                     <button class="btn btn-link px-2"
                       onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                       <i class="fas fa-minus"></i>
                     </button>

                     <input id="form1" min="0" name="quantity" value="1" type="number"
                       class="form-control form-control-sm" style="width: 50px;" />

                     <button class="btn btn-link px-2"
                       onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                       <i class="fas fa-plus"></i>
                     </button>
                   </div>
                 </td>
                 <td class="align-middle">
                   <p class="mb-0" style="font-weight: 500;">Rp. 100.000</p>
                 </td>
               </tr>
               @endfor

             </tbody>
           </table>
         </div>

         <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
           <div class="card-body p-4">

             <div class="row">
               <div class="col-md-6 col-lg-4 col-xl-6">
                 <div class="row">
                   <div class="col-12 col-xl-6">
                     <div class="form-outline mb-4 mb-xl-5">
                       <label class="form-label" for="typeName">Name</label>
                       <input type="text" id="typeName" class="form-control form-control-lg"
                         placeholder="Andre Taulany" />

                     </div>

                     <div class="form-outline mb-4 mb-xl-5">
                        <label class="form-label" for="typeExp">Shipping Adress</label>
                       <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="Address"
                          />
                     </div>
                   </div>

                 </div>
               </div>
               <div class="col-lg-4 col-xl-3">
                 <div class="d-flex justify-content-between" style="font-weight: 500;">
                   <p class="mb-2">Subtotal</p>
                   <p class="mb-2">Rp 200.000</p>
                 </div>

                 <div class="d-flex justify-content-between" style="font-weight: 500;">
                   <p class="mb-0">Shipping</p>
                   <p class="mb-0">Rp. 20.000</p>
                 </div>

                 <hr class="my-4">

                 <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                   <p class="mb-2">Total</p>
                   <p class="mb-2">Rp. 220.000</p>
                 </div>

                 <button type="button" class="btn btn-primary btn-block btn-lg">
                   <div class="d-flex justify-content-between">
                     <span>Checkout</span>
                   </div>
                 </button>

               </div>
             </div>

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

@endsection
