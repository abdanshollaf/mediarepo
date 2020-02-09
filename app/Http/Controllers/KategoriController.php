<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class KategoriController extends Controller
{

    public function index(){
        //fetch all posts data
        $kategori = Kategori::orderBy('id','asc')->get();
        //pass posts data to view and load list view
        return view('managekategori/kategoriindex', ['kategori' => $kategori]);
    }

    public function add(){
        //load form view
        $inijenis = DB::table('jenis')->OrderBy('nama_jenis','ASC')->get();
        return view('managekategori/kategoriadd',compact('inijenis'));
    }

    public function insert(Request $request){
        //validate post data
        $inijenis = DB::table('jenis')->OrderBy('nama_jenis','ASC')->get();
        // if(Request::ajax(    )){
        //     $input = Input::get('');
        // }
        $this->validate($request, [
            'jenis' => 'required',
            'namakategori' => 'required',
        ]);
        
        // //get post data
        // $kategoriData = $request->all();

        Kategori::create([
            'id_jenis' => $request['jenis'],
            'namakategori'=>$request['namakategori'],
        ]);
        
        // //insert post data
        // Kategori::create($kategoriData);
        
        //store status message
        Session::flash('success_msg', 'Kategori added successfully!');

        return redirect()->route('daftarkategori');
    }

    public function edit($id){
        //get post data by id
        $kategori = Kategori::find($id);
        
        //load form view
        return view('managekategori/kategoriedit', ['kategori' => $kategori]);
    }
    
    public function update($id, Request $request){
        //validate post data
        $this->validate($request, [
            'id_jenis' => 'required',
            'namakategori' => 'required',
        ]);
        
        //get post data
        $kategoriData = $request->all();
        
        //update post data
        Kategori::find($id)->update($kategoriData);
        
        //store status message
        Session::flash('success_msg', 'Kategori updated successfully!');

        return redirect()->route('daftarkategori');
    }
    
    public function delete($id){
        //update post data
        kategori::find($id)->delete();
        
        //store status message
        Session::flash('success_msg', 'Kategori deleted successfully!');

        return redirect()->route('daftarkategori');
    }

}
