<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Pengguna;

class PenggunaController extends Controller
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
        $data = Pengguna::orderBy('created_at', 'desc')->get();

        return view('pengguna.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.create');
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
            'nama'              => 'required|max:50',
            'email'             => 'required|max:30|email|unique:pengguna,email',
            'password'          => 'required',
        ],$messages);
        
        Pengguna::create($request->all());

        return redirect('/pengguna')->with('success', 'Data berhasil diinput');
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
        $data = Pengguna::find($id);
        
        return view('pengguna.edit', compact('data'));
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
        Pengguna::find($id)->update($request->all());

        $messages           = [
            'required'  => 'mohon :attribute di isi',
            'min'       => 'isilah :attribute minimal :min karakter',
            'max'       => ':attribute maksimal :max karakter',
        ];

        $validateData       = $request->validate([
            'nama'              => 'required|max:50',
            'email'             => 'required|max:30|email|unique:pengguna,email',
            'password'          => 'required',
        ],$messages);

        return redirect('/pengguna')->with('success', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengguna::find($id)->delete();

        return redirect('/pengguna')->with('success', 'Data berhasil dihapus');
    }
}
