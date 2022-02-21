<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id = Auth::id();
        $pegawai = DB::table('users')->where('id', $id)->first();
        $following =  DB::table('follow')->where('to', $id)->groupBy('to')->count();
        $follower =  DB::table('follow')->where('from', $id)->groupBy('from')->count();
        return view('Profile',['id'=>$id,'pegawai' => $pegawai,'follower' => $follower,'following' => $following]);
    }
    public function all()
    {
        $pegawai = DB::table('users')->get();
        return view('Explore',['pegawai' => $pegawai]);
    }
    public function store(Request $request)
    {
        $spps = DB::table('follow')->where('from', $request->from)->where('to', $request->to)->first();
        if (empty($spps)) {
            DB::table('follow')->insert([
                'from' => $request->from,
                'to' => $request->to,
                'state' => $request->state
            ]);
        }else{
            DB::table('follow')->where('id',$spps->id)->update([
                'state' => $request->state
            ]);
        }

        return redirect()->route('Profile.edit',$request->to)->with('message', 'Catatan berhasil');
    }
    public function edit($id)
    {
        $spps = DB::table('users')->where('id', $id)->first();
        $following =  DB::table('follow')->where('to', $id)->where('state', 'y')->groupBy('to')->count();
        $follower =  DB::table('follow')->where('from', $id)->where('to', 'y')->groupBy('from')->count();
        if (!empty($spps)) {
            return view('Profile',['id'=>$id,'pegawai' => $spps,'follower' => $follower,'following' => $following]);
        }else{
            return redirect()->route('Profile');   
        }
    }
}
