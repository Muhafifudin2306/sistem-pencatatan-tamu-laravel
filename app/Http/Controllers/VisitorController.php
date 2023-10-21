<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeVisitor(Request $request)
    {
        Visitor::create([
            'visitor_name' => $request->input('visitor_name'),
            'nik' => $request->input('nik'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'jam_masuk' => $request->input('jam_masuk'),
            'tanggal_masuk' => $request->input('tanggal_masuk'),
            'jam_keluar' => $request->input('jam_keluar'),
            'tanggal_keluar' => $request->input('tanggal_keluar'),
            'purpose' => $request->input('purpose')
        ]);

        return redirect('/home')->with('success', 'Data pengunjung berhasil disimpan.');
    }

    public function destroyVisitor($id)
    {
        $visitor = Visitor::find($id);

        $visitor->delete();

        return redirect('/home')->with('success', 'Data pengunjung berhasil disimpan.');
    }
}
