<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller {
    public function index (){
        $title = "Manajemen User - PPKD Sticker";
        $users = User::orderBy('id', 'desc') -> get(); //select * from user order by id desc
        return view('admin.user.index', compact('title', 'users'));
    }

    public function create (){
        $title = "Tambah User - PPKD Sticker";
        return view('admin.user.create', compact('title'));
    }

    public function store(Request $request){}
}