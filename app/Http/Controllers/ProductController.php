<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $filterData = Product::limit(16)->get();

        /** @var User $user */
        $user = Auth::user();
        $exceeded_limit = $user->spendThisMonth() > $user->shopping_limit ? 1 : 0;

        if (!$user->notif_limit && $exceeded_limit) {
            $user->notif_limit = true;
            $user->save();
        }

        return view('home', [
            'data' => $filterData,
            'exceeded_limit' => $exceeded_limit,
        ]);
    }

    /**
     * Search and Display a listing of the resource.
     * how to use -> /search?name={product_name}
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
        $term = $request->get('name');
        $filterData = Product::where('name', 'LIKE', '%' . $term . '%')
            ->get();

        dd($filterData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
