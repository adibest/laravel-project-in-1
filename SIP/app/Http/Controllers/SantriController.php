<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Santri;

class SantriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Santri::orderBy('created_at', 'desc')->get();

        return view('santri.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('santri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages           = [
            'required'  => 'mohon :attribute di isi',
            'min'       => 'isilah :attribute minimal :min karakter',
            'max'       => ':attribute maksimal :max karakter',
        ];
        
        $validateData       = $request->validate([
            'nisn'              => 'required|min:10|max:10',
            'nama'              => 'required|max:50',
            'tempat_lahir'      => 'required|max:30',
            'tanggal_lahir'     => 'required',
            'alamat'            => 'required',
        ],$messages);
        
        Santri::create($request->all());

        return redirect('/santri')->with('success', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Santri::find($id);
        
        return view('santri.edit', compact('data'));
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
        Santri::find($id)->update($request->all());

        $messages           = [
            'required'  => 'mohon :attribute di isi',
            'min'       => 'isilah :attribute minimal :min karakter',
            'max'       => ':attribute maksimal :max karakter',
        ];

        $validateData       = $request->validate([
            'nisn'              => 'required|min:10|max:10',
            'nama'              => 'required|max:50',
            'tempat_lahir'      => 'required|max:30',
            'tanggal_lahir'     => 'required',
            'alamat'            => 'required',
        ],$messages);

        return redirect('/santri')->with('success', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Santri::find($id)->delete();

        return redirect('/santri')->with('success', 'Data berhasil dihapus');
    }
}
