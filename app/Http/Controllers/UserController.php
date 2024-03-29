<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Pegawai;
use App\Models\Pesantren;
use App\Models\User;
use App\Models\WaliSantri;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $roles = Role::pluck('name','name')->all();
        // $pesantren = Pesantren::all();
        // $pesantren = Pesantren::where('id', $user->pesantren_id)->first();
        $pesantren = Pesantren::get();
        // dd($pesantren);
        return view('users.create',compact('roles', 'pesantren'));
    }

    public function setPegawai($id)
    {
        $user = auth()->user();
        $roles = Role::pluck('name','name')->all();
        $pegawai = Pegawai::get();
        $user = User::where('id', $id)->first();
        return view('users.set-pegawai',compact('pegawai', 'id', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'pesantren_id' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        if($request->roles == 'guru'){
            $guru = Guru::create([
                'nama_guru' => $request->name,
                'pesantren_id' => $request->pesantren_id
            ]);
            $request->request->add([
                'guru_id' => $guru->id,
                'pesantren_id' => $request->pesantren_id
            ]);
        }elseif($request->roles == 'walisantri'){
            $walisantri = WaliSantri::create([
                'nama_walisantri' => $request->name,
                'email_walisantri' => $request->email
            ]);
            $request->request->add([
                'walisantri_id' => $walisantri->id,
                'pesantren_id' => $request->pesantren_id
            ]);
        }

        // if($request->walisantri){
        //     $walisantri = WaliSantri::create([
        //         'nama_walisantri' => $request->name,
        //         'email_walisantri' => $request->email
        //     ]);
        //     $request->request->add([
        //         'walisantri_id' => $walisantri->id,
        //         'pesantren_id' => $request->pesantren_id
        //     ]);
        // }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    public function storeSetPegawai(Request $request)
    {
        User::where('id', $request->user_id)->update([
            'pegawai_id' => $request->pegawai_id,
            ]);
        return redirect()->route('users.index')
            ->with('success','Set User Pegawai successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
