<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index() {
        return view('dataalternatif', [
            'users' => Alternatif::all(),
            'title' => 'Data alternatif'
        ]);
    }
    public function add() {
        return view('adddataalternatif',[
            'title' => 'Tambah Data alternatif'
        ]);
    }
    public function edit($id){
        
        // $alternatif = Alternatif::where('id', $id)->first();

        // return view('editalternatif', [
        //     'alternatif' => $alternatif,
        //     'title' => 'Edit Data alternatif'
        // ]);
        return view('editalternatif')->with([
            'alternatif' => Alternatif::find($id),
        ]);

    }

    public function update(Request $request, $id) {
        $nama1      = $request->input('nama');
        $efek_Samping1   = $request->input('efek_Samping');
        $efektivitas1 = $request->input('efektivitas');
        $harga1 = $request->input('harga');
        $dosis1 = $request->input('dosis');
        $ketersediaan1 = $request->input('ketersediaan');
        
        $alternatif = Alternatif::where('id', $id)->first();
        $alternatif->nama    = $nama1;
        $alternatif->efek_Samping = $efek_Samping1;
        $alternatif->efektivitas = $efektivitas1;
        $alternatif->harga = $harga1;
        $alternatif->dosis = $dosis1;
        $alternatif->ketersediaan = $ketersediaan1;

        $alternatif->save();

        return redirect()->to('/alternatif');
    }


    public function dashboard(){
        $alternatif= Alternatif::count();

        return view('main', compact('alternatif'));

    }

    public function store(Request $request) {
        $nama1 = $request->input('nama');
        $efek_Samping1 = $request->input('efek_Samping');
        $efektivitas1 = $request->input('efektivitas');
        $harga1 = $request->input('harga');
        $dosis1 = $request->input('dosis');
        $ketersediaan1 = $request->input('ketersediaan');

        $alternatif = new Alternatif;
        $alternatif->nama    = $nama1;
        $alternatif->efek_Samping = $efek_Samping1;
        $alternatif->efektivitas = $efektivitas1;
        $alternatif->harga = $harga1;
        $alternatif->dosis = $dosis1;
        $alternatif->ketersediaan = $ketersediaan1;

        $alternatif->save();

        return redirect()->to('/alternatif');
    }
    public function delete($id) {
        $nama = Alternatif::where('id', $id)->first();
        $nama->delete();
        return redirect()->back();
    }
}
