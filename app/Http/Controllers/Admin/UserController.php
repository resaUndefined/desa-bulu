<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id','!=',Auth::id())->paginate(10);
        return view('admin.user.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                        'password' => 'required|min:6',
                        'email' => 'required|email|unique:users',
                        'level' => 'required|integer',
                        'nama' => 'required',
                    ],
                    [
                        'password.required' => 'Password wajib diisi',
                        'password.min' => 'Minimal password 6 karakter',
                        'email.required' => 'Email wajib diisi',
                        'email.email' => 'Format email tidak sesuai',
                        'email.unique' => 'Email sudah digunakan',
                        'level.required' => 'Level wajib diisi',
                        'level.integer' => 'Level tidak sesuai',
                        'nama.required' => 'Nama harus diisi',
                    ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $user = new User();
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->is_admin = $request->level;
            $pesanSukses = null;
            $pesanGagal = null;
            if ($request->level == 1) {
                $pesanSukses = 'Admin berhasil ditambahkan';
                $pesanGagal = 'Admin gagal ditambahkan';
            }else{
                $pesanSukses = 'Staff berhasil ditambahkan';
                $pesanGagal = 'Staff gagal ditambahkan';
            }
            $userSave = $user->save();
            if ($userSave) {
                return redirect()->route('user.index')->with('sukses', $pesanSukses);
            }
            return redirect()->route('user.index')->with('gagal', $pesanGagal);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
            if (is_null($request->password)) {
                $validator = Validator::make($request->all(), [
                        'email' => 'required|email|unique:users,email,'. $user->id,
                        'level' => 'required|boolean',
                        'nama' => 'required|string',
                        'status' => 'required|boolean',
                    ],
                    [
                        'email.required' => 'Email wajib diisi',
                        'email.email' => 'Format email tidak sesuai',
                        'email.unique' => 'Email sudah digunakan',
                        'level.required' => 'Level wajib diisi',
                        'level.boolean' => 'Level tidak sesuai dengan pilihan',
                        'nama.required' => 'Nama harus diisi',
                        'nama.string' => 'Nama harus berupa string',
                        'status.required' => 'status harus diisi',
                        'status.boolean' => 'Status tidak sesuai dengan pilihan',
                    ]);
            }else{
                $validator = Validator::make($request->all(), [
                        'password' => 'min:6',
                        'email' => 'required|email|unique:users,email,'. $user->id,
                        'level' => 'required|boolean',
                        'nama' => 'required|string',
                        'status' => 'required|boolean',
                    ],
                    [
                        'password.min' => 'Minimal password 6 karakter',
                        'email.required' => 'Email wajib diisi',
                        'email.email' => 'Format email tidak sesuai',
                        'email.unique' => 'Email sudah digunakan',
                        'level.required' => 'Level wajib diisi',
                        'level.boolean' => 'Level tidak sesuai dengan pilihan',
                        'nama.required' => 'Nama harus diisi',
                        'nama.string' => 'Nama harus berupa string',
                        'status.required' => 'status harus diisi',
                        'status.boolean' => 'Status tidak sesuai dengan pilihan',
                    ]);
            }

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }else{
                $user->name = $request->nama;
                $user->email = $request->email;
                $user->is_active = $request->status;
                $user->is_admin = $request->level;
                if (!is_null($request->password)) {
                    $user->password = Hash::make($request->password);
                }
                $userSave = $user->save();
                $pesanSuskes = null;
                $pesanGagal = null;
                if ($request->level == 1) {
                    $pesanSukses = 'Admin berhasil diupdate';
                    $pesanGagal = 'Admin Gagal diupdate';
                }else{
                    $pesanSukses = 'Staff berhasil diupdate';
                    $pesanGagal = 'Staff Gagal diupdate';
                }
                if ($userSave) {
                    return redirect()->route('user.index')->with('sukses', $pesanSukses);
                }
                return redirect()->route('users.index')->with('gagal', $pesanGagal);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $pesanSukses = null;
        if ($user->level == 1) {
            $pesanSukses = 'Admin berhasil dihapus';
        }else{
            $pesanSukses = 'Staff berhasil dihapus';
        }
        $user->delete();
        return redirect()->route('user.index')->with('sukses', $pesanSukses);
    }
}
