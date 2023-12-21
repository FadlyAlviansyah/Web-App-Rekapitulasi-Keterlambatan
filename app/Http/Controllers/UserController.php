<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $data = $request->all();
        $data['password'] = Str::substr($request->name, 0, 3) . Str::substr($request->email, 0, 3);

        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $validatedData['password'] = Hash::make($data['password']);

        User::create($validatedData);

        return redirect()->route('user.home')->with('added', 'Berhasil menambahkan data user!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, $id)
    {
        $data = $request->all();

        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'role' => 'required',
        ];

        if ($request->password) {
            $rules['password'] = 'required|min:6';
        }

        $data = $request->validate($rules);

        if($request->password){
            $data['password'] = $request->password;
            $data['password'] = Hash::make($request->password);
        } else{
            $data['password'] = $request->oldPassword;
        }

        User::where('id', $id)->update($data);

        return redirect()->route('user.home')->with('edited', 'Berhasil mengubah data user!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data pengguna!');
    }

    public function loginAuth(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = $request->only(['email', 'password']);
        if (Auth::attempt($user)) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('failed', 'Proses login gagal, silahkan coba kembali dengan data yang benar!');
        }
    }
    
    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('logout', 'Anda telah logout!');
    }
}
