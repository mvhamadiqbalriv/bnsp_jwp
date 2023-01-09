<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skema;

class SkemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $list = Skema::get();

        return view('skema.index', compact('list'));
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
        $request->validate([
            'Kd_skema' => 'required|unique:skema,Kd_skema',
            'Nm_skema' => 'required',
            'Jenis' => 'required',
            'Jml_unit' => 'required|numeric',
        ],[
            'Kd_skema.unique' => 'Kode skema sudah digunakan'
        ], $request->all());

        $data = $request->except('_token');
        $new = new Skema($data);

        if ($new->save()) {
            return redirect()->route('sertifikasi.index')->with('success', 'Skema berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Skema::where('Kd_skema', $id)->first();

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Kd_skema' => 'required|unique:skema,Kd_skema,'.$id.',Kd_skema',
            'Nm_skema' => 'required',
            'Jenis' => 'required',
            'Jml_unit' => 'required',
        ],[
            'Kd_skema.unique' => 'Kode skema sudah digunakan'
        ], $request->all());

        $update = Skema::where('Kd_skema', $id)->first();
        $update->Kd_skema = $request->Kd_skema;
        $update->Nm_skema = $request->Nm_skema;
        $update->Jenis = $request->Jenis;
        $update->Jml_unit = $request->Jml_unit;

        if ($update->save()) {
            return redirect()->route('sertifikasi.index')->with('success', 'Skema berhasil diperbaharui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Skema::where('Kd_skema', $id)->first();
        $delete->delete();

        return redirect()->route('sertifikasi.index')->with('success', 'Skema berhasil dihapus');;
    }
}
