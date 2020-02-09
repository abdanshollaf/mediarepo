<?php

namespace App\Http\Controllers;
use App\usermodel;
use App\rolemodel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
class usersController extends Controller
{

    public function index(){
        $posts = usermodel::orderBy('id_role','asc','nama','asc')->get();
        return view('user/index', ['posts' => $posts]);
    }
    
    public function details($id){
        $post = usermodel::find($id);
        return view('user/details', ['post' => $post]);
    }
    
    public function add(){
        $creates = rolemodel::orderBy('id_role')->get();
        return view('user/add', ['creates' => $creates]);
    }
    
    public function insert(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'id_role' => 'required'
        ]);
        
        $postData = ([
            'nama' => $request['nama'],
            'username'=>$request['username'],
            'password' => bcrypt($request['password']),
            'id_role' => $request['id_role'],
        ]);
        
        usermodel::create($postData);
        Session::flash('success_msg', 'User added successfully!');
        return redirect()->route('users.index');
    }
    
    public function edit($id){
        $post = usermodel::find($id);
        $creates = rolemodel::orderBy('id_role')->get();
        return view('user/edit', ['post' => $post], ['creates' => $creates]);
    }
    
    public function update($id, Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'id_role' => 'required'
        ]);
        
        $postData = ([
            'nama' => $request['nama'],
            'username'=>$request['username'],
            'password' => bcrypt($request['password']),
            'id_role' => $request['id_role'],
        ]);
        usermodel::find($id)->update($postData);
        Session::flash('success_msg', 'User updated successfully!');
        return redirect()->route('users.index');
    }
    
    public function delete($id){
        usermodel::find($id)->delete();
        Session::flash('danger_msg', 'User deleted successfully!');
        return redirect()->route('users.index');
    }


    public function create(){
        $creates = rolemodel::orderBy('id_role')->get();
        return view('user/edit', ['creates' => $creates]);
    }
}