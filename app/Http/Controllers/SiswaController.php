<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    //
    public function index()
    {
        $siswas=Siswa::latest()->paginate(10);
        return view('siswa.index', compact('siswas'));
    }
    public function create()
    {
        return view('siswa.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'nis'=>'required',
            'nama_siswa'=>'required',
            'jk'=>'required',
            'kelas'=>'required',
            'jurusan'=>'required',
            'alamat'=>'required'
        ]);
        DB::table('siswas')->insert([
            'nis'=>$request->nis,
            'nama_siswa'=>$request->nama_siswa,
            'jk'=>$request->jk,
            'kelas'=>$request->kelas,
            'jurusan'=>$request->jurusan,
            'alamat'=>$request->alamat
        ]);
        if(DB::table('siswas')){
            return redirect()->route('siswa.index')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('siswa.index')->with(['error'=>'Data gagal disimpan']);
        }
    }
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();
        if($siswa){
            //redirect dengan pesan sukses
            return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
    public function update(Request $request, Siswa $siswa)
    {
    $this->validate($request, [
        'nis' => 'required',
        'nama_siswa' => 'required',
        'jk' => 'required',
        'kelas' => 'required',
        'jurusan' => 'required',
        'alamat' => 'required'
        
    ]);
    //get data siswa by ID
 
    $siswa=Siswa::findOrFail($siswa->id); 
    $siswa->update([
        'nis'=>$request->nis,
        'nama_siswa'=>$request->nama_siswa,
        'jk'=>$request->jk,
        'kelas'=>$request->kelas ,
        'jurusan'=>$request->jurusan,
        'alamat'=>$request->alamat 
       
    ]); 
    if($siswa){
    //redirect dengan pesan sukses
    return redirect()->route('siswa.index')->with(['success'=>'Data berhasil 
    disimpan']);
    }else{
        return redirect()->route('siswa.index')->with(['error'=>'Data gagal disimpan']);
    }
    }


}
