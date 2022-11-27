<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifCount = Auth::user()->notifications()->count();
        $school = Auth::user()->schoolInfo()->first();
        $kelasCount = $school->kelas()->count();
        $kelas = $school->kelas()->get();
        $mapelCount = $school->mapel()->count();
        if(Auth::user()->role == 0) {
            $classMates = Auth::user()->siswa()->first()
                    ->kelas()->first()
                    ->siswa()->limit(4)
                    ->get();
            return view('menu.mainmenu', [
                'school' => $school, 
                'notifCount' => $notifCount,
                'kelasCount' => $kelasCount,
                'classMates' => $classMates,
                'kelas' => $kelas
            ]);
        }
        return view('menu.mainmenu', [
            'school' => $school, 
            'notifCount' => $notifCount, 
            'kelasCount' => $kelasCount,
            'kelas' => $kelas,
            'mapelCount' => $mapelCount
        ]);
    }
}
