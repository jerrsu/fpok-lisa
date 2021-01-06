<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataFungsional;
use App\JabatanFungsional;
use App\UnitKerja;
use App\PengajuanCuti;
use App\PengajuanCutiViewer;
use App\DataPegawai;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class PengajuanCutiController extends Controller
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
        
        
        $datas = PengajuanCutiViewer::all();
        
        
        return view('pengajuanCuti.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $datapegawai = DataPegawai::get();
        $datajabatan = JabatanFungsional::get();
        $dataunit = UnitKerja::get();

        return view('pengajuanCuti.create',compact('datapegawai','datajabatan','dataunit'));
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
            'idpegawai' => 'required',
            'idjabatan' => 'required',
            'id_unit_kerja' => 'required'
        ]);
        
        
        $month_name = date('F', strtotime($request->get('start_date')));
        $year_number = date('Y', strtotime($request->get('start_date')));

        PengajuanCuti::create([ 
            'idpegawai' => $request->get('idpegawai'),
            'idjabatan' => $request->get('idjabatan'),
            'idunit' => $request->get('id_unit_kerja'),

            'masakerja' => $request->get('masakerja'),
            'jenis_cuti' => $request->get('jenis_cuti'),
            'alasan_cuti' => $request->get('alasan_cuti'),
            'lama_cuti' => $request->get('lama_cuti'),

            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'alamat' => $request->get('alamat'),
            'hasil' => $request->get('hasil'),
            'tlp' => $request->get('tlp'),

            'catatan_cuti' => $request->get('catatan_cuti'),
            'n2_sisa' => $request->get('n2_sisa'),
            'n2_ket' => $request->get('n2_ket'),
            'n1_sisa' => $request->get('n1_sisa'),

            'n1_ket' => $request->get('n1_ket'),
            'n_sisa' => $request->get('n_sisa'),
            'n_ket' => $request->get('n_ket'),

            'pertimbangan' => $request->get('pertimbangan'),
            'alasan_pertimbangan' => $request->get('alasan_pertimbangan'),
            'keputusan' => $request->get('keputusan'),
            'alasan_keputusan' => $request->get('alasan_keputusan'),

            'idatasan' => $request->get('idatasan'),
            'idpejabat' => $request->get('idpejabat'),
            'year_number' => $year_number,
            'month_name' => $month_name
            
        ]);
             
        // $data = PengajuanKgbViewer::findOrFail($save->id);

        alert()->success('Berhasil.','Data telah ditambahkan!');
        
        return redirect()->route('pengajuancuti.index');
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_jabatan_fungsional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $datapegawai = DataPegawai::get();
        $datajabatan = JabatanFungsional::get();
        $dataunit = UnitKerja::get();
        $data = PengajuanCutiViewer::findOrFail($id);
        $getpegawai = DataPegawai::findOrFail($data->idpegawai);
        $getjabatan = JabatanFungsional::findOrFail($data->idjabatan);
        $getdataunit = UnitKerja::findOrFail($data->idunit);
        
        return view('pengajuanCuti.edit', compact('data','datapegawai','datajabatan','dataunit'
        ,'getjabatan','getpegawai','getdataunit'));
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
            'idpegawai' => 'required',
            'idjabatan' => 'required',
            'id_unit_kerja' => 'required'
        ]);
        $month_name = date('F', strtotime($request->get('start_date')));
        $year_number = date('Y', strtotime($request->get('start_date')));

        PengajuanCuti::find($id)->update([ 
            'idpegawai' => $request->get('idpegawai'),
            'idjabatan' => $request->get('idjabatan'),
            'idunit' => $request->get('id_unit_kerja'),

            'masakerja' => $request->get('masakerja'),
            'jenis_cuti' => $request->get('jenis_cuti'),
            'alasan_cuti' => $request->get('alasan_cuti'),
            'lama_cuti' => $request->get('lama_cuti'),

            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'alamat' => $request->get('alamat'),
            'hasil' => $request->get('hasil'),
            'tlp' => $request->get('tlp'),
            
            'catatan_cuti' => $request->get('catatan_cuti'),
            'n2_sisa' => $request->get('n2_sisa'),
            'n2_ket' => $request->get('n2_ket'),
            'n1_sisa' => $request->get('n1_sisa'),

            'n1_ket' => $request->get('n1_ket'),
            'n_sisa' => $request->get('n_sisa'),
            'n_ket' => $request->get('n_ket'),

            'pertimbangan' => $request->get('pertimbangan'),
            'alasan_pertimbangan' => $request->get('alasan_pertimbangan'),
            'keputusan' => $request->get('keputusan'),
            'alasan_keputusan' => $request->get('alasan_keputusan'),
            'idatasan' => $request->get('idatasan'),
            'idpejabat' => $request->get('idpejabat'),
            'year_number' => $year_number,
            'month_name' => $month_name
        ]);
        
        

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('pengajuancuti.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        PengajuanCuti::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('pengajuancuti.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_jabatan_fungsional
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PengajuanCutiViewer::findOrFail($id);
        $pdf = PDF::loadView('pengajuanCuti.view',compact('data'));
        return $pdf->download('Pengajuan-cuti');
        // return view('print.viewcuti', compact('data'));
    }

    
}
