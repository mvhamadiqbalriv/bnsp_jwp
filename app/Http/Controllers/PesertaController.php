<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Skema;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $list = Peserta::when($search, function($q) use ($search) {
            return $q->where('Nm_peserta', 'like', '%' . $search . '%');
        })->get();

        return view('peserta.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skema = Skema::all();

        return view('peserta.create', compact('skema'));
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
            'Kd_skema' => 'required',
            'Nm_peserta' => 'required',
            'Jekel' => 'required',
            'Alamat' => 'required',
            'No_hp' => 'required',
        ], $request->all());

        $data = $request->except('_token');
        $new = new Peserta($data);

        if ($new->save()) {
            return redirect()->route('index')->with('success', 'Peserta berhasil ditambahkan');
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
        $data = Peserta::where('Kd_skema', $id)->first();

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
        $detail = Peserta::find($id);
        $skema = Skema::all();

        return view('peserta.edit', compact('skema', 'detail'));
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
            'Kd_skema' => 'required',
            'Nm_peserta' => 'required',
            'Jekel' => 'required',
            'Alamat' => 'required',
            'No_hp' => 'required|numeric',
        ], $request->all());

        $update = Peserta::find($id);
        $update->Nm_peserta = $request->Nm_peserta;
        $update->Kd_skema = $request->Kd_skema;
        $update->Jekel = $request->Jekel;
        $update->Alamat = $request->Alamat;
        $update->No_hp = $request->No_hp;

        if ($update->save()) {
            return redirect()->route('index')->with('success', 'Peserta berhasil diperbaharui');
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
        $delete = Peserta::find($id);
        $delete->delete();

        return redirect()->route('index')->with('success', 'Peserta berhasil ditambahkan');
    }
}
