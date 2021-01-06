<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\JabatanFungsional;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class JabatanController extends Controller
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
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $datas = JabatanFungsional::all();
        return view('jabatanfungsional.index', compact('datas'));
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

        return view('jabatanfungsional.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       

        

        JabatanFungsional::create([ 
                'nama_jabatan' => $request->get('nama_jabatan')
            ]);

            Session::flash('message', 'Berhasil ditambahkan!');
            Session::flash('message_type', 'success');
        return redirect()->route('jabatan.index');

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_jabatan_fungsional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        if(Auth::user()->level == 'user') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }
        

        $data = JabatanFungsional::findOrFail($id);
        return view('jabatanfungsional.edit', compact('data'));
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
        
     
                JabatanFungsional::find($id)->update([
                    'nama_jabatan' => $request->get('nama_jabatan')
                       ]);

                       Session::flash('message', 'Berhasil diubah!');
                       Session::flash('message_type', 'success');
        // return redirect()->back();
        return redirect()->route('jabatan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JabatanFungsional::find($id)->delete();
        Session::flash('message', 'Berhasil dihapus!');
            Session::flash('message_type', 'success');
        return redirect()->route('jabatan.index');
    }
 
}