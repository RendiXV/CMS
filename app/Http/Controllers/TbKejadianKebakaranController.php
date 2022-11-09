<?php

namespace App\Http\Controllers;

use App\Models\Tb_kejadian_kebakaran;
use Illuminate\Http\Request;

class TbKejadianKebakaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kejadianKebakaran = Tb_kejadian_kebakaran::all();
        return view('admin.kejadian-kebakaran.index', compact('kejadianKebakaran'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tb_kejadian_kebakaran  $tb_kejadian_kebakaran
     * @return \Illuminate\Http\Response
     */
    public function show(Tb_kejadian_kebakaran $tb_kejadian_kebakaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tb_kejadian_kebakaran  $tb_kejadian_kebakaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Tb_kejadian_kebakaran $tb_kejadian_kebakaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tb_kejadian_kebakaran  $tb_kejadian_kebakaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tb_kejadian_kebakaran $tb_kejadian_kebakaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tb_kejadian_kebakaran  $tb_kejadian_kebakaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tb_kejadian_kebakaran $tb_kejadian_kebakaran)
    {
        //
    }
}
