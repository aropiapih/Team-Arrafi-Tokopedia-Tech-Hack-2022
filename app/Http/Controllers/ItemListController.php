<?php

namespace App\Http\Controllers;

use App\Models\ItemList;
use Illuminate\Http\Request;

class ItemListController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index(int $shoppinglist_id)
    {
        //
        $filterData = ItemList::where('list_id', $shoppinglist_id)->get();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        //
        $validated = $request->validate([
            'list_id' => 'required',
            'name_item' => 'required',
        ]);

        ItemList::create([
            'list_id' => $request->list_id,
            'name_item' => $request->name_item,
        ]);

        // todo: do something after it
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemList  $itemList
     * @return \Illuminate\Http\Response
     */
    public function show(ItemList $itemList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemList  $itemList
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemList $itemList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemList  $itemList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemList $itemList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemList  $itemList
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemList $itemList)
    {
        //
        ItemList::destroy($itemList);
    }
}
