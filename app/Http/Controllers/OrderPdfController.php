<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade as PDF;

class OrderPdfController extends Controller
{
    public function downloadOrder($orderId)
    {
        $order = Order::findOrFail($orderId);  // Assurez-vous que la commande existe

        // Création du PDF à partir de la vue spécifiée et des données passées.
        $pdf = PDF::loadView('orders.pdf', compact('order'));

        // Téléchargement du PDF avec un nom de fichier dynamique basé sur l'ID de la commande.
        return $pdf->download('commande-' . $orderId . '.pdf');
    }
}
