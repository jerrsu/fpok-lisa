<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pendidikan;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class PendidikanController extends Controller
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

        $datas = Pendidikan::all();
        return view('pendidikan.index', compact('datas'));
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

        return view('pendidikan.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
 

        Pendidikan::create([ 
                'nama' => $request->get('nama')
            ]);

            Session::flash('message', 'Berhasil ditambahkan!');
            Session::flash('message_type', 'success'); 
        return redirect()->route('pendidikan.index');

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
        

        $data = Pendidikan::findOrFail($id);
        return view('pendidikan.edit', compact('data'));
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
         
     
                Pendidikan::find($id)->update([
                    'nama' => $request->get('nama')
                       ]);

                       Session::flash('message', 'Berhasil di Ubah!');
                       Session::flash('message_type', 'success'); 
        // return redirect()->back();
        return redirect()->route('pendidikan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pendidikan::find($id)->delete();
        Session::flash('message', 'Berhasil Dihapus!');
            Session::flash('message_type', 'success'); 
        return redirect()->route('pendidikan.index');
    }
}
