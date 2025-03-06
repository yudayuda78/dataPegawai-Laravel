<?php

namespace App\Http\Controllers;

use App\Models\DataPegawai;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DataPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = DataPegawai::all();
        return view('datapegawai', compact('pegawai'));
    }

    public function tambahdata(){
        $pegawai = DataPegawai::select('position')->distinct()->get();
        $kantor = DataPegawai::select('kantor')->distinct()->get();
        

        return view('tambahdata', compact('pegawai', 'kantor'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'position' => 'required|string|max:255',
        //     'umur' => 'required|integer|min:18',
        //     'kantor' => 'required|string|max:255',
        //     'photo' => 'nullable|image|mimes:jpg,png,gif|max:2048',
        //     'date_start' => 'required|date',
        // ]);

        $dateStart = Carbon::createFromFormat('m/d/Y', $request->date_start)->format('Y-m-d');
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->storeAs('public/pegawai', time() . '_' . $request->file('photo')->getClientOriginalName());
        } else {
            $photoPath = null;
        }

       
    
        DataPegawai::create([
            'nama' => $request->nama,
            'position' => $request->position,
            'umur' => $request->umur,
            'kantor' => $request->kantor,
            'photo' => $photoPath,
            'start_date' => $dateStart,
        ]);

        return redirect()->route('/')->with('success', 'Data pegawai berhasil disimpan!');
     

    }

}
