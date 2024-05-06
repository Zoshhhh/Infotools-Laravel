<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Rdv;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); 
        $prochainsRdvs = Rdv::where('idEmploye', $userId)
                            ->where('dateRdv', '>=', Carbon::now()->toDateString())
                            ->orderBy('dateRdv', 'asc')
                            ->take(1) 
                            ->get();

        dd($prochainsRdvs);

        return view('dashboard', compact('prochainsRdvs'));
    }
}

