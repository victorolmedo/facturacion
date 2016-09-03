<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modo_pago;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class Modo_pagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $modo_pagos = Modo_pago::paginate(15);

        return view('modo_pagos.index', compact('modo_pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('modo_pagos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        Modo_pago::create($request->all());

        Session::flash('flash_message', 'Modo_pago added!');

        return redirect('modo_pagos');
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
        $modo_pago = Modo_pago::findOrFail($id);

        return view('modo_pagos.show', compact('modo_pago'));
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
        $modo_pago = Modo_pago::findOrFail($id);

        return view('modo_pagos.edit', compact('modo_pago'));
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
        
        $modo_pago = Modo_pago::findOrFail($id);
        $modo_pago->update($request->all());

        Session::flash('flash_message', 'Modo_pago updated!');

        return redirect('modo_pagos');
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
        Modo_pago::destroy($id);

        Session::flash('flash_message', 'Modo_pago deleted!');

        return redirect('modo_pagos');
    }
}
