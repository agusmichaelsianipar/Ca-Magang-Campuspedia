<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ErrorFormRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Response;

class MainController extends Controller
{
    public function index()
    {
        return view('mainPage.landingPage');
    }
    public function result($interval)
    {
        dd($interval);
        if(session('sukses')){
            Alert::success('Presensi Berhasil', "Biar beda");
        }
        return view('mainPage.landingPage');
    }
    public function save(ErrorFormRequest $request){
        $valid=$this->validate($request,[
            'tanggal' => 'required',
            'jmasuk' => 'required',
            'jkeluar'=> 'required',
            'tugas'=> 'required',
            'kendala'=> 'required',
        ],
            [
                'tanggal.required' => 'Kolom Tanggal Belum Diisi',
                'jmasuk.required' => 'Kolom Jam Masuk Belum Diisi',
                'jkeluar.required' => 'Kolom Jam Keluar Belum Diisi',
                'tugas.required' => 'Kolom Tugas Belum Diisi',
                'kendala.required' => 'Kolom Kendala Belum Diisi',

            ]);
        
        $excep = array(12,16,18);
        $ranger = array();

        function setJamMasuk($jam){
            $a_masuk = explode(":",$jam);
            if(in_array('12',$a_masuk)){
                $ranged = 13;
                $jMasuk ='13:00';
            }
            elseif (in_array('16',$a_masuk)) {
                $ranged = 16;
                $jMasuk ='16:00';
            }
            elseif (in_array('18',$a_masuk)) {
                $ranged = 18;
                $jMasuk ='18:00';
            }else {
                $ranged = intval($a_masuk[0]);
                $jMasuk =$jam;
            }
            $fMasuk = array($ranged,$jMasuk);
            
            return $fMasuk;
        }

        function setJamKeluar($jam){
            $a_keluar = explode(":",$jam);
            if(in_array('12',$a_keluar)){
                $ranged = 12;
                $jKeluar ='12:00';
            }
            elseif (in_array('16',$a_keluar)) {
                $ranged = 16;
                $jKeluar ='16:00';
            }
            elseif (in_array('18',$a_keluar)) {
                $ranged = 18;
                $jKeluar ='18:00';
            }else {
                $ranged = intval($a_keluar[0]);
                $jKeluar =$jam;
            }
            $fKeluar = array($ranged,$jKeluar);

            return $fKeluar;
        }

        $fMasuk=setJamMasuk($request->jmasuk);
        $fKeluar=setJamKeluar($request->jkeluar);
        $tmasuk = date_create($fMasuk[1]);
        $tkeluar = date_create($fKeluar[1]);
        $interval = date_diff($tmasuk,$tkeluar);
        if ($fMasuk[0]>$fKeluar[0]) {
            for($x=$fKeluar[0];$x<=$fMasuk[0];$x++){
                array_push($ranger,$x);
            }
        }else {
            for($x=$fMasuk[0];$x<=$fKeluar[0];$x++){
                array_push($ranger,$x);
            }
        }
        // dd($interval->h);
        foreach ($ranger as $ra){
            
        $fInterval=intval($interval->h);
        for($x=0;$x<3;$x++){
            if($ra == $excep[$x]){
                $interval->h=$interval->h-1;
            }
        }
    }

        $interval->h=$fInterval;
        Alert::success('Presensi Berhasil', 'Hari Ini Anda Bekerja Sebanyak '.$fInterval.' Jam '.$interval->i.' Menit');
        return redirect()->back()->with('sukses');

    }


}
