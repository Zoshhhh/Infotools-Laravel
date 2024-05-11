<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use App\Models\Employer;
use App\Models\Client;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $userId = $user->id;
        $userEmail = $user->email;

        $employer = Employer::where('email', $userEmail)->first();
        $employerId = $employer ? $employer->employer_id : null;

        $appointments = $employerId ? Appointment::where('salesperson_id', $employerId)->get() : collect();

        return view('appointments.index', compact('appointments', 'userId', 'userEmail', 'employerId'));
    }


    public function dashboard()
    {
        $user = Auth::user();
        $userEmail = $user->email;

        $employer = Employer::where('email', $userEmail)->first();
        $employerId = $employer ? $employer->employer_id : null;

        $appointments = $employerId
            ? Appointment::where('salesperson_id', $employerId)
            ->where('status', '!=', 'Realized')
            ->orderBy('date_time', 'asc')
            ->take(3)
            ->get()
            : collect();

        return view('dashboard', compact('appointments'));
    }


    public function create()
    {
        $clients = Client::all(); // Supposons que vous ayez un modèle Client
        $salespeople = Employer::where('role', 'salesperson')->get(); // Exemple de récupération des commerciaux

        return view('appointments.create', compact('clients', 'salespeople'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ public function store(Request $request)
    {
        // Validation des données soumises
        $validatedData = $request->validate([
            'date_time' => 'required|date',
            'location' => 'required|string|max:255',
            'status' => 'required|string|in:Planned,Realized,Canceled',
            'client_id' => 'required|exists:clients,client_id',
        ]);

        try {
            // Récupération de l'ID du commercial (salesperson) connecté
            $user = Auth::user();
            $userEmail = $user->email;
            $employer = Employer::where('email', $userEmail)->first();
            $employerId = $employer ? $employer->employer_id : null;

            // Assurez-vous qu'un commercial est bien connecté
            if (!$employerId) {
                return back()->with('error', 'Votre compte ne permet pas la création de rendez-vous.');
            }

            // Création d'une nouvelle instance de rendez-vous avec l'ID du commercial connecté
            $appointment = new Appointment();
            $appointment->date_time = $validatedData['date_time'];
            $appointment->location = $validatedData['location'];
            $appointment->status = $validatedData['status'];
            $appointment->client_id = $validatedData['client_id'];
            $appointment->salesperson_id = $employerId;

            // Enregistrement de l'instance dans la base de données
            $appointment->save();

            // Redirection vers la liste des rendez-vous avec un message de succès
            return redirect('/appointment')->with('success', 'Le rendez-vous a été créé avec succès.');
        } catch (\Exception $e) {
            // Redirection vers le formulaire de création en cas d'erreur avec un message d'erreur
            return redirect('/appointment/create')->with('error', 'Une erreur s\'est produite lors de la création du rendez-vous. Détails de l\'erreur : ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($appointment_id)
    {
        // Utilisez 'appointment_id' au lieu de 'id'
        $appointment = Appointment::where('appointment_id', $appointment_id)->first();

        if (!$appointment) {
            return redirect('/appointment')->with('error', 'Rendez-vous non trouvé');
        }

        // Assurez-vous que la variable passée à la vue est correctement nommée
        return view('appointments.show', compact('appointment'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $clients = Client::all();
        $appointment = Appointment::findOrFail($id);
        return view('appointments.edit', compact('appointment', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $appointmentId)
    {
        $validatedData = $request->validate([
            'date_time' => 'required|date',
            'location' => 'required|string|max:255',
            'status' => 'required|string|in:Planned,Realized,Canceled',
            'client_id' => 'required|exists:clients,client_id',
            // Ajoutez d'autres champs à valider si nécessaire
        ]);

        $appointment = Appointment::findOrFail($appointmentId);
        $appointment->date_time = $validatedData['date_time'];
        $appointment->location = $validatedData['location'];
        $appointment->status = $validatedData['status'];
        $appointment->client_id = $validatedData['client_id'];
        // Mettez à jour d'autres attributs si nécessaire
        $appointment->save();

        return redirect('/appointment')->with('success', 'Le rendez-vous a été supprimé avec succès.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $appointment = Appointment::findOrFail($id);
            $appointment->delete();

            return redirect('/appointment')->with('success', 'Le rendez-vous a été supprimé avec succès.');
        } catch (\Exception $e) {
            return redirect('/appointment')->with('error', 'Une erreur s\'est produite lors de la suppression du rendez-vous.');
        }
    }
}
