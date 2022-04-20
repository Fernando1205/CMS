<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvetoryRequest;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function store(InvetoryRequest $request)
    {
        try {
            Inventory::create($request->all());
            return redirect()->back()->with('success','Invetario agregado exitosamente');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error','Ha ocurrido un error');
        }

    }
}
