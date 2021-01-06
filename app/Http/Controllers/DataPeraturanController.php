<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataPeraturan;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class DataPeraturanController extends Controller
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
         $datas = DataPeraturan::all(); 
        
        return view('dataPeraturan.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dataPeraturan.create',compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       

        $this->validate($request,[
            'no' => 'required'
        ]);

        if($request->file('filesk') == ''){
            DataPeraturan::create([ 
                'no' => $request->get('no'),
                'tentang' => $request->get('tentang'),
                'tahun' => $request->get('tahun'),
                'filesk' => $request->get('filesk')
            ]);
        }
        else{
            $file = $request->file('filesk');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = "PN"."_".time().".".$namafile;
            $tujuan_upload = 'data_peraturan';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

        DataPeraturan::create([ 
                'no' => $request->get('no'),
                'tentang' => $request->get('tentang'),
                'tahun' => $request->get('tahun'),
                'filesk' => $file
            ]);
        }

            

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('dataperaturan.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_jabatan_fungsional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = DataPeraturan::findOrFail($id);
        return view('dataperaturan.edit', compact('data'));
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
        $this->validate($request,[
            'no' => 'required'
        ]);
        
        if($request->file('filesk') == ''){

            DataPeraturan::find($id)->update([ 
                'no' => $request->get('no'),
                    'tentang' => $request->get('tentang'),
                    'tahun' => $request->get('tahun')
                ]);
        }

        else{

            $data = DataPeraturan::where('id',$id)->first();
            if($data->filesk!=NULL){
                File::delete('data_peraturan/'.$data->filesk);
            }

            $file = $request->file('filesk');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = "PN"."_".time().".".$namafile;
            $tujuan_upload = 'data_peraturan';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

            DataPeraturan::find($id)->update([ 
                'no' => $request->get('no'),
                'tentang' => $request->get('tentang'),
                'tahun' => $request->get('tahun'),
                'filesk' => $file
            ]);

        }

        

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('dataperaturan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataPeraturan::where('id',$id)->first();
        if($data->filesk!=NULL){
            File::delete('data_peraturan/'.$data->filesk);
        }
        
        
        
        DataPeraturan::find($id)->delete();
        
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('dataperaturan.index');
    }
}
