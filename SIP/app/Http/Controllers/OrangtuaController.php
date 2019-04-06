<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Orangtua;
use App\Model\Santri;

class OrangtuaController extends Controller
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
        $data = Orangtua::orderBy('created_at', 'desc')->get();

        return view('orangtua.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $santri = Santri::all();
        
        return view('orangtua.create', compact('santri'));
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
            'nik'           => 'required|min:16',
            'nama'          => 'required|max:50',
            'gender'        => 'required',
            'id_santri'     => 'required',
            'pekerjaan'     => 'required|max:50',
            'pendidikan'    => 'required|max:50',
        ],$messages);
        
        Orangtua::create($request->all());

        return redirect('/orangtua')->with('success', 'Data berhasil diinput');
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
        $data = Orangtua::find($id);
        $santri = Santri::all();
        $orangtua = Orangtua::all();
        
        return view('orangtua.edit', compact('data','santri', 'orangtua'));
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
        Orangtua::find($id)->update($request->all());

        $messages           = [
            'required'  => 'mohon :attribute di isi',
            'min'       => 'isilah :attribute minimal :min karakter',
            'max'       => ':attribute maksimal :max karakter',
        ];
        
        $validateData       = $request->validate([
            'nik'           => 'required|min:16',
            'nama'          => 'required|max:50',
            'gender'        => 'required',
            'id_santri'     => 'required',
            'pekerjaan'     => 'required|max:50',
            'pendidikan'    => 'required|max:50',
        ],$messages);

        return redirect('/orangtua')->with('success', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Orangtua::find($id)->delete();

        return redirect('/orangtua')->with('success', 'Data berhasil dihapus');
    }
}
