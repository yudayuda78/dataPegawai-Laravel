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
    public function index(Request $request)
    {
        $pegawai = DataPegawai::all();
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'List Data Pegawai',
                'data' => $pegawai
            ], 200);
        }
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
        // if ($request->hasFile('photo')) {
        //     $photoPath = $request->file('photo')->storeAs('public/pegawai', time() . '_' . $request->file('photo')->getClientOriginalName());
        // } else {
        //     $photoPath = null;
        // }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $originalName = $file->getClientOriginalName();
            $destinationPath = public_path('pegawai');
            $file->move($destinationPath, $originalName);
            $photoPath = 'pegawai/' . $originalName;
        } else {
            $photoPath = null;
        };
        // dd($photoPath);
        $dokumenPaths = $request->dokumenPaths ?? [];
        // dd($dokumenPaths);
       
    
        DataPegawai::create([
            'nama' => $request->nama,
            'position' => $request->position,
            'umur' => $request->umur,
            'kantor' => $request->kantor,
            'photo' => $photoPath,
            'document' => json_encode($dokumenPaths),
            'start_date' => $dateStart,
        ]);

        return redirect()->route('/')->with('success', 'Data pegawai berhasil disimpan!');
     

    }

    public function uploadDokumen(Request $request){
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $originalName = $file->getClientOriginalName();
            $destinationPath = public_path('dokumen');
        
        // Pindahkan file ke folder public/dokumen
            $file->move($destinationPath, $originalName);
            $filePath = 'dokumen/' . $originalName;

            return response()->json(['path' => $filePath]);
        }

        return response()->json(['error' => 'Tidak ada file yang diunggah'], 400);
    }


}
