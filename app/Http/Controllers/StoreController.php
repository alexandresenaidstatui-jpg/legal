<?php
// app/Http/Controllers/StoreController.php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\CarroModel;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    /**
     * =============================================
     * MÉTODOS PARA API (já existentes)
     * =============================================
     */
    
    // ... (mantenha todos os métodos API que já criamos)
    
    /**
     * =============================================
     * MÉTODOS PARA WEB (novos)
     * =============================================
     */

    /**
     * Display a listing of the resource (WEB).
     */
    public function indexWeb()
    {
        $stores = Store::withTrashed()->orderBy('name')->paginate(10);
        return view('stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource (WEB).
     */
    public function create()
    {
        return view('stores.create');
    }

    /**
     * Show store commission simulator.
     */
    public function commission()
    {
        $cars = CarroModel::orderBy('modelo')->get();
        $stores = Store::active()->orderBy('name')->get();

        return view('stores.commission', compact('cars', 'stores'));
    }

    /**
     * Store a newly created resource in storage (WEB).
     */
    public function storeWeb(Request $request)
    {
        $data = $request->all();
        $data['cnpj'] = preg_replace('/\D/', '', $request->input('cnpj', ''));
        $data['phone'] = trim($request->input('phone', ''));
        $data['zip_code'] = preg_replace('/\D/', '', $request->input('zip_code', ''));
        $data['is_active'] = $request->boolean('is_active');
        $data['is_featured'] = $request->boolean('is_featured');
        $data['has_local_delivery'] = $request->boolean('has_local_delivery');

        $validator = Validator::make($data, Store::rules());

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            Store::create($validator->validated());
        } catch (\Throwable $e) {
            return redirect()->back()
                ->withErrors(['store' => 'Não foi possível cadastrar a loja. Verifique os dados e tente novamente.'])
                ->withInput();
        }

        return redirect()->route('stores.create')
            ->with('success', '🏍️ Loja cadastrada com sucesso!');
    }

    /**
     * Display the specified resource (WEB).
     */
    public function showWeb($id)
    {
        $store = Store::withTrashed()->findOrFail($id);
        return view('stores.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource (WEB).
     */
    public function edit($id)
    {
        $store = Store::withTrashed()->findOrFail($id);
        return view('stores.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage (WEB).
     */
    public function updateWeb(Request $request, $id)
    {
        $store = Store::withTrashed()->findOrFail($id);

        $validator = Validator::make($request->all(), Store::rules($id));

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $store->update($request->all());

        return redirect()->route('stores.index')
            ->with('success', '🏍️ Loja atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage (WEB - soft delete).
     */
    public function destroyWeb($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();

        return redirect()->route('stores.index')
            ->with('success', '🏍️ Loja desativada com sucesso!');
    }

    /**
     * Restore a soft-deleted store (WEB).
     */
    public function restoreWeb($id)
    {
        $store = Store::withTrashed()->findOrFail($id);
        $store->restore();

        return redirect()->route('stores.index')
            ->with('success', '🏍️ Loja restaurada com sucesso!');
    }

    /**
     * Force delete a store (WEB - permanent).
     */
    public function forceDeleteWeb($id)
    {
        $store = Store::withTrashed()->findOrFail($id);
        $store->forceDelete();

        return redirect()->route('stores.index')
            ->with('success', '🏍️ Loja excluída permanentemente!');
    }

    /**
     * List only active stores (WEB).
     */
    public function activeWeb()
    {
        $stores = Store::active()->orderBy('name')->paginate(10);
        return view('stores.index', compact('stores'))
            ->with('filter', 'ativas');
    }

    /**
     * List featured stores (WEB).
     */
    public function featuredWeb()
    {
        $stores = Store::featured()->active()->orderBy('name')->paginate(10);
        return view('stores.index', compact('stores'))
            ->with('filter', 'destaques');
    }
}
