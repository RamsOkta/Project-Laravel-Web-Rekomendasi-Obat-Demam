<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller {

    public function index() {
        return view('datakriteria', [
            'users' => Kriteria::all(),
            'title' => 'Data kriteria'
        ]);
    }
    public function add() {
        return view('adddatakriteria',[
            'title' => 'Tambah Data kriteria'
        ]);
    }
    public function edit($id){
        
        // $nama = Kriteria::where('id', $id)->first();

        // return view('editkriteria', [
        //     'nama' => $nama,
        //     'title' => 'Edit Data kriteria'
        // ]);
        return view('editkriteria')->with([
            'kriteria' => Kriteria::find($id),
        ]);

    }

    public function update(Request $request, $id) {
        $nama1    = $request->input('nama');
        $bobot1   = $request->input('bobot');
        $label1   = $request->input('label');
        
        
        $kriteria = Kriteria::where('id', $id)->first();
        $kriteria->nama  = $nama1;
        $kriteria->bobot = $bobot1;
        $kriteria->label = $label1;
       

        $kriteria->save();

        return redirect()->to('/kriteria');
    }


    public function dashboard(){
        $kriteria= Kriteria::count();

        return view('main', compact('kriteria'));

    }

    public function store(Request $request) {
        $nama1     = $request->input('nama');
        $bobot1   = $request->input('bobot');
        $label1   = $request->input('label');
        

        $kriteria= new Kriteria;
        $kriteria->nama = $nama1;
        $kriteria->bobot = $bobot1;
        $kriteria->label = $label1;
        

        $kriteria->save();

        return redirect()->to('/kriteria');
    }
    public function delete($id) {
        $nama = Kriteria::where('id', $id)->first();
        $nama->delete();
        return redirect()->back();
    }
}
