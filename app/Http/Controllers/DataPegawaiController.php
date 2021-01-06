<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataPegawai;
use App\DataPegawaiViewer;
use App\DataKeluargaViewer;
use App\DataKeluargaPasanganViewer;
use App\DataKeluargaAnakViewer;
use App\DataPendidikanViewer;
use App\DataFungsionalViewer;
use App\DataStrukturalViewer;
use App\DataPangkatViewer;
use App\DataDokumenViewer;
use App\DataPelatihanViewer;
use App\DataJurnalViewer;
use App\DataKepakaranViewer;
use App\DataPenelitianViewer;

use App\DataPengabdianViewer;
use App\DataPenghargaanViewer;
use App\DataPenugasanViewer;
use App\DataPeraturan;
use App\DataStudyViewer;

use App\UnitKerja;
use App\Status;
use App\JabatanFUngsional;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class DataPegawaiController extends Controller
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
            $datas = DataPegawaiViewer::where('id',Auth::user()->idpegawai)
            ->get();
        }
        else{
            $datas = DataPegawaiViewer::all();
        }

        
        return view('dataPegawai.index', compact('datas'));
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

        $units = UnitKerja::get();
        $status = Status::get();
        $jabfus = JabatanFUngsional::get();
        return view('dataPegawai.create', compact('units', 'status', 'jabfus'));
        // return view('dataPegawai.create');
    }

  


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       

        // $this->validate($request,[
        //     'nik' => 'required'
    	// ]);

        $save = DataPegawai::create([ 
                'nik' => $request->get('nik'),
                'nip' => $request->get('nip'),
                'nama' => $request->get('nama'),                
                'gelar_depan' => $request->get('gelar_depan'),
                'gelar_belakang' => $request->get('gelar_belakang'),
                'npwp' => $request->get('npwp'),
                'nidn' => $request->get('nidn'),
                'ttl' => $request->get('ttl'),
                'agama' => $request->get('agama'),
                'jk' => $request->get('jk'),
                'golongan_darah' => $request->get('golongan_darah'),
                'status_nikah' => $request->get('status_nikah'),
                'status_kepegawaian' => $request->get('status_kepegawaian'),
                'status_pegawai' => $request->get('status_pegawai'),
                'alamat' => $request->get('alamat'),
                'email' => $request->get('email'),
                'tlp' => $request->get('tlp'),
                'pensiun' => $request->get('pensiun'),
                'id_unit_kerja' => $request->get('id_unit_kerja'),
                'id_status' => $request->get('id_status'),
                'id_jabatan_fungsional' => $request->get('id_jabatan_fungsional'),
                'tanggallahir' => $request->get('tanggallahir')

            ]);
            $idPegawai = $save->id;
            User::create([
                'idpegawai'=>$idPegawai,
                'name' => $request->get('nama'),
                'username' => $request->get('nip'),
                'level' => 3,
                'password' => bcrypt((123456))
                
            ]);
            

            

        alert()->success('Berhasil.','Data telah ditambahkan!');

            // User::create([
            //     'name' => $request->get('nama'),
            //     'username' => $request->get('nip'),
            //     'level' => 'user',
            //     'password' => bcrypt('123456')
            // ]);
        return redirect()->route('dataPegawai.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        
        $detailpegawai = DataPegawaiViewer::findOrFail($id);
        $ortu = DataKeluargaViewer::where('idpegawai',$id)->get();
        $anak = DataKeluargaAnakViewer::where('idpegawai',$id)->get();
        $pasangan = DataKeluargaPasanganViewer::where('idpegawai',$id)->get();
        $pendidikan = DataPendidikanViewer::where('idpegawai',$id)->get();
        $fungsional = DataFungsionalViewer::where('idpegawai',$id)->get();
        $struktural = DataStrukturalViewer::where('idpegawai',$id)->get();
        $pangkat = DataPangkatViewer::where('idpegawai',$id)->get();
        $dok = DataDokumenViewer::where('idpegawai',$id)->get();
        $jurnal = DataJurnalViewer::where('idpegawai',$id)->get();
        $kepakaran = DataKepakaranViewer::where('idpegawai',$id)->get();
        $penelitian = DataPenelitianViewer::where('idpegawai',$id)->get();
        $pelatihan = DataPelatihanViewer::where('idpegawai',$id)->get();
        $pengabdian = DataPengabdianViewer::where('idpegawai',$id)->get();        
        $penghargaan = DataPenghargaanViewer::where('idpegawai',$id)->get();
        $penugasan = DataPenugasanViewer::where('idpegawai',$id)->get();
        $peraturan = DataPeraturan::get();
        $study = DataStudyViewer::where('idpegawai',$id)->get();
        
        return view('dataPegawai.view', compact('detailpegawai','ortu','pendidikan','fungsional','struktural','pangkat','dok',
                    'jurnal','kepakaran','penelitian','anak','pasangan','pelatihan','pengabdian','penghargaan','penugasan','peraturan','study'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_jabatan_fungsional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        // if(Auth::user()->level == 'user') {
        //         Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
        //         return redirect()->to('/');
        // }
        
        $datas = DataPegawaiViewer::findOrFail($id);
        $data = DataPegawai::findOrFail($id);
        $units = UnitKerja::get();
        $status = Status::get();
        $jabfus = JabatanFUngsional::get();
        return view('dataPegawai.edit', compact('data','units', 'status', 'jabfus','datas'));
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
        $data = DataPegawai::findOrFail($id);

        $this->validate($request,[
            'nip' => 'required'
                ]);
                
                
                
     
                DataPegawai::find($id)->update([
                    'nik' => $request->get('nik'),
                    'nama' => $request->get('nama'),
                    'nip' => $request->get('nip'),
                    'gelar_depan' => $request->get('gelar_depan'),
                    'gelar_belakang' => $request->get('gelar_belakang'),
                    'npwp' => $request->get('npwp'),
                    'nidn' => $request->get('nidn'),
                    'ttl' => $request->get('ttl'),
                    'agama' => $request->get('agama'),
                    'jk' => $request->get('jk'),
                    'golongan_darah' => $request->get('golongan_darah'),
                    'status_nikah' => $request->get('status_nikah'),
                    'status_kepegawaian' => $request->get('status_kepegawaian'),
                    'status_pegawai' => $request->get('status_pegawai'),
                    'alamat' => $request->get('alamat'),
                    'email' => $request->get('email'),
                    'tlp' => $request->get('tlp'),
                    'pensiun' => $request->get('pensiun'),
                    'id_unit_kerja' => $request->get('id_unit_kerja'),
                    'id_status' => $request->get('id_status'),
                    'id_jabatan_fungsional' => $request->get('id_jabatan_fungsional'),
                    'tanggallahir' => $request->get('tanggallahir')
                       ]);
                                
            

            $study = User::where('idpegawai',$id)->update([
                'name' => $request->get('nama'),
                'username' => $request->get('nip')
                
            ]);

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('dataPegawai.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DataPegawai::find($id)->delete();
        $study = User::where('idpegawai',$delete->id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('dataPegawai.index');
    }
}
