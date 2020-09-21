<?php

namespace App\Http\Controllers;

use App\Repair;
use App\Settings;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkTechnician');
        $this->middleware('checkWorker');
        $this->middleware('checkAccountant');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function user_new()
    {
        return view('admin.user-new');
    }

    public function user_create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'surname' => 'required|string',
            'login' => 'required|string|unique:users',
            'workplace' => 'required|integer',
            'role' => 'required|integer',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'login' => $request->login,
            'workplace' => $request->workplace,
            'role' => $request->role,
            'password' => Hash::make($request->password)
        ]);

        return back();
    }

    public function user_list()
    {
        $users = User::where('role', '!=', 1)->get();
        return view('admin.user-list', compact('users'));
    }

    public function user_edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user-edit', compact('user'));
    }

    public function user_update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'surname' => 'required|string',
            'workplace' => 'required|integer',
            'role' => 'required|integer',
        ]);

        $user = User::findOrFail($id);

        if ($request->login != $user->login)
        {
            $this->validate($request, [
                'login' => 'required|string|unique:users',
            ]);
        }

        if ($request->password)
        {
            $password = Hash::make($request->password);
            $user->password = $password;
        }

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->login = $request->login;
        $user->workplace = $request->workplace;
        $user->role = $request->role;

        $user->save();
        return redirect()->route('user-list');
    }

    public function user_delete($id)
    {
        User::findOrFail($id)->delete();
        return back();
    }

    public function invoice_data()
    {
        $invoice = Settings::first();
        if ($invoice == null)
        {
            $invoice = Settings::create([
                'nip' => '',
                'name' => '',
                'address' => '',
            ]);
        }
        return view('admin.invoice', compact('invoice'));
    }

    public function invoice_edit(Request $request)
    {
        $invoice = Settings::first();

        $invoice->nip = $request->nip;
        $invoice->name = $request->name;
        $invoice->address = $request->address;

        $invoice->save();
        return back();
    }
}
