<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataStudy;
use App\DataPegawai;
use App\DataStudyViewer;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class DataStudyController extends Controller
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
        // $nip = Auth::get();

        if(Auth::user()->level == 3) {
            $datas = DataStudyViewer::where('idpegawai',Auth::user()->idpegawai)->get();
            
            
        }
        else{$datas = DataStudyViewer::all(); 
        }
        
        return view('dataStudy.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(Auth::user()->level == 'user') {
        //     Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        //     return redirect()->to('/');
        // }
        $data = DataPegawai::get();

        return view('datastudy.create',compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       

        

        DataStudy::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'tingkat' => $request->get('tingkat'),
                'perguruan' => $request->get('perguruan'),
                'program' => $request->get('program'),
                'tahun' => $request->get('tahun'),
                'negara' => $request->get('negara')
            ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('datastudy.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_jabatan_fungsional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $pegawai = DataPegawai::get();
        $data = DataStudy::findOrFail($id);
        $pegawais = DataPegawai::findOrFail($data->idpegawai);
        return view('datastudy.edit', compact('data','pegawai','pegawais'));
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
        

        DataStudy::find($id)->update([ 
            'idpegawai' => $request->get('idpegawai'),
                'tingkat' => $request->get('tingkat'),
                'perguruan' => $request->get('perguruan'),
                'program' => $request->get('program'),
                'tahun' => $request->get('tahun'),
                'negara' => $request->get('negara')
            ]);

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('datastudy.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {         
        DataStudy::find($id)->delete();
        
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('datastudy.index');
    }
}
