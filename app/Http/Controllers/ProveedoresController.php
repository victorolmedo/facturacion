<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Proveedor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $proveedores = Proveedor::paginate(15);

        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        Proveedor::create($request->all());

        Session::flash('flash_message', 'Proveedore added!');

        return redirect('proveedores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $proveedore = Proveedor::findOrFail($id);

        return view('proveedores.show', compact('proveedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $proveedore = Proveedor::findOrFail($id);

        return view('proveedores.edit', compact('proveedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        
        $proveedore = Proveedor::findOrFail($id);
        $proveedore->update($request->all());

        Session::flash('flash_message', 'Proveedore updated!');

        return redirect('proveedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Proveedor::destroy($id);

        Session::flash('flash_message', 'Proveedore deleted!');

        return redirect('proveedores');
    }
}
