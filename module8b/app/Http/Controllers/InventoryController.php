<?php

namespace App\Http\Controllers;

use App\Models\Item;

class InventoryController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('inventory.index', ['items' => $items]);
    }
}
