<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UnitKerja;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        if(Auth::user()->level == 3) {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $datas = UnitKerja::all();
        return view('unitKerja.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        return view('unitKerja.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       

         

        UnitKerja::create([ 
                'nama_unit' => $request->get('nama_unit')
            ]);

            Session::flash('message', 'Berhasil ditambahkan!');
            Session::flash('message_type', 'success'); 
        return redirect()->route('unitKerja.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = UnitKerja::findOrFail($id);

        return view('unitKerja.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }
        

        $data = UnitKerja::findOrFail($id);
        return view('unitKerja.edit', compact('data'));
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
        
     
                UnitKerja::find($id)->update([
                    'nama_unit' => $request->get('nama_unit')
                       ]);

                       Session::flash('message', 'Berhasil diubah!');
                       Session::flash('message_type', 'success'); 
        // return redirect()->back();
        return redirect()->route('unitKerja.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UnitKerja::find($id)->delete();
        Session::flash('message', 'Berhasil dihapus!');
            Session::flash('message_type', 'success'); 
        return redirect()->route('unitKerja.index');
    }
}
