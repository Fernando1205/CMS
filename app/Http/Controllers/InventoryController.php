<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvetoryRequest;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Variant;
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
            return redirect()->back()->with('success','Inventario eliminado exitosamente');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }

    public function productInvVariant(Request $request, Inventory $inventory)
    {
        try {
            Variant::create([
                'product_id' => $inventory->product_id,
                'inventory_id' => $inventory->id,
                'name' => $request->name
            ]);
            return redirect()->back()->with('success','Variante agregado exitosamente');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }
    public function invVarDestroy(Variant $variant)
    {
        try {
            $variant->delete();
            return redirect()->back()->with('success','Variante eliminado exitosamente');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }
}
