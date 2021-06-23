<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusChange extends Controller
{
    public function index()
    {
        return view('status');
    }
    public function update(Request $request)
    {
        DB::table('users')->where('id', $request->only('idPerson'))->update(['status' => $request->statusPerson]);
        return redirect()->route('home');
    }
}
