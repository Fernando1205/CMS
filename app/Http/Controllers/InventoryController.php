<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvetoryRequest;
use App\Models\Inventory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function store(InvetoryRequest $request): RedirectResponse
    {
        try {
            Inventory::create($request->all());
            return redirect()->back()->with('success','Invetario agregado exitosamente');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }

    public function edit(Inventory $inventory): View
    {
        return view('admin.products.editInventory', compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory): RedirectResponse
    {
        try {
            $inventory->update($request->all());
            return redirect()->back()->with('success','Invetario agregado exitosamente');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }

    public function destroy(Inventory $inventory): RedirectResponse
    {
        try {
            $inventory->delete();
            return redirect()->back()->with('success','Invetario agregado exitosamente');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }
}
