<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class MapelController extends Controller
{
    //
    public function index()
    {
        $mapels=Mapel::latest()->paginate(10);
        return view('mapel.index', compact('mapels'));
    }
    public function create()
    {
        return view('mapel.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_mapel'=>'required',
            'namaguru'=>'required'
        ]);
        DB::table('mapels')->insert([
            'nama_mapel'=>$request->nama_mapel,
            'namaguru'=>$request->namaguru
        ]);
        if(DB::table('mapels')){
            return redirect()->route('mapel.index')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('mapel.index')->with(['error'=>'Data gagal disimpan']);
        }
    }
    public function edit(Mapel $mapel)
    {
        return view('mapel.edit', compact('mapel'));
    }
    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);

        $mapel->delete();
        if($mapel){
            //redirect dengan pesan sukses
            return redirect()->route('mapel.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('mapel.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
    public function update(Request $request, Mapel $mapel)
    {
    $this->validate($request, [
        'nama_mapel' => 'required',
        'namaguru' => 'required'
    ]);
    //get data mapel by ID
 
    $mapel=Mapel::findOrFail($mapel->id); 
    $mapel->update([
        'nama_mapel'=>$request->nama_mapel,
        'namaguru'=>$request->namaguru 
    ]); 
    if($mapel){
    //redirect dengan pesan sukses
    return redirect()->route('mapel.index')->with(['success'=>'Data berhasil 
    disimpan']);
    }else{
        return redirect()->route('mapel.index')->with(['error'=>'Data gagal disimpan']);
    }
    }


}


