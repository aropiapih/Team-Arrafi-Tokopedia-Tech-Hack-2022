<?php

namespace App\Http\Controllers;

use App\Models\ItemList;
use App\Models\ShoppingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
        $shoppingList = ShoppingList::find($shoppinglist_id);

        if ($shoppingList->user_id != Auth::id()) {
            return Redirect::home();
        }

        $filterData = $shoppingList->itemList()->get();

        return view('item-list', [
            'data' => $filterData,
            'id' => $shoppinglist_id,
            'name_shopping_list' => $shoppingList->name_list
        ]);
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

        return Redirect::back();
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

    public function delete(Request $request)
    {
        ItemList::find($request->item_list_id)->delete();

        return Redirect::back();
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
