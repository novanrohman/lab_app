<?php

namespace App\Http\Controllers\Backend;

use App\Models\Buku;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function BukuView()
    {
        // $allDataUser = User::all();
        $data['allDataBuku'] = Buku::all();
        return view('backend.buku.view_buku', $data);
    }

    public function BukuAdd(){
        //    $data['allDataUser']=User::all();
           return view('backend.buku.add_buku');
    }

    public function bukuStore(Request $request){
        $validateData=$request->validate([
            'textJudul'=>'required',
        ]);

        $data= new Buku();
        $data->judulBuku=$request->textJudul;
        $data->namaPengarang=$request->textPengarang;
        $data->save();


        return redirect()->route('buku.view')->with('info','Tambah barang berhasil');
    }


}
