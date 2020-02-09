<?php

namespace App\Http\Controllers;
use App\UploadMedia;
use App\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use DB;
use Storage;
use CloudConvert;
class UploadMediaController extends Controller
{
    public function add(){
        $inijenis = DB::table('jenis')->OrderBy('nama_jenis','ASC')->get();
        return view('media/uploadmediaadd',compact('inijenis'));
    }

    public function getKategori(Request $request) {
        $kategori = DB::table("kategori")->where("id_jenis",$request->id_jenis)->OrderBy('namakategori','ASC')->pluck("namakategori","id");
        return response()->json($kategori);
    }

    public function getkat($id_jenis) {
        $kategori = DB::table("kategori")->where("id_jenis",$id_jenis)->OrderBy('id','ASC')->pluck("namakategori","id");
        return $kategori;
    }

    public function store(Request $request)
    {
        $validasi = $request['jenis'];
        if($validasi == 1){
            $this->validate($request, [
                'jenis' => 'required',
                'kategori' => 'required',
                'keterangan' => 'required',
                'namafile' => 'required',
                'namafile.*' => 'mimes:jpeg,png,jpg,bmp'
        ]);
        }
        else{
            $this->validate($request, [
                'jenis' => 'required',
                'kategori' => 'required',
                'keterangan' => 'required',
                'namafile' => 'required',
                'namafile.*' => 'mimes:mp4'
        ]);
        }
        
        if($request->hasfile('namafile'))
         {
            if($validasi == 1){
                foreach($request->file('namafile') as $image)
                {
                $name=$request->input('jenis')."_".$request->input('kategori')."_".$request->input('keterangan')."-".$image->getClientOriginalName('namafile');
                UploadMedia::create([
                    'id_jenis' => $request['jenis'],
                    'id_kategori' => $request['kategori'],
                    'keterangan' => $request['keterangan'],
                    'namafile' => $name,
                    'path' => $image->move(public_path().'/images/'.'Foto/', $name),  
                ]);
                }
            }
            else{
                foreach($request->file('namafile') as $image)
                { 
                $name=$request->input('jenis')."_".$request->input('kategori')."_".$request->input('keterangan')."-".$image->getClientOriginalName('namafile');
                UploadMedia::create([
                    'id_jenis' => $request['jenis'],
                    'id_kategori' => $request['kategori'],
                    'keterangan' => $request['keterangan'],
                    'namafile' => $name,
                    'path' => $image->move(public_path().'/images/'.'Video/', $name),  
                ]);
                }   
            }
            
         }
         Session::flash('success_msg', 'Media added successfully!');
         return redirect()->route('mediaindex');
    }

    public function index(Request $request)
    {
        $inijenis = DB::table('jenis')->OrderBy('nama_jenis','ASC')->get();
        $jenis = $request->input('jenis');
        $kat = $request->input('kategori');
        $ket = $request->input('keterangan');
        $images = UploadMedia::where('id_jenis','like','%'.$jenis.'%')->where('id_kategori','like','%'.$kat.'%')
        ->where('keterangan','like','%'.$ket.'%')->OrderBy('created_at','DESC')->paginate(24);
        $data = [
            'images' => $images,
            'jenis' => $jenis,
            'kat' => $kat,
            'ket' => $ket,
            'kats' => $jenis != null ? $this->getkat($jenis):null
        ];
        return view('media/mediaindex', $data, compact('inijenis'));
    }

    public function destroy($id)
    {
        $del = UploadMedia::find($id);
        unlink($del->path);
        $del->delete();
        Session::flash('danger_msg', 'Media deleted successfully!');
        return redirect('mediaindex');
    }

        public function show($id)
    {
        $dl = UploadMedia::find($id);
        return response()->download($dl->path,($dl->namafile));
    }
}