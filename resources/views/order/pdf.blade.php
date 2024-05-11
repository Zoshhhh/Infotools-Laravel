<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commande #{{ $order->order_id }}</title>
    <style>
        body { font-family: 'DejaVu Sans'; }
        .content { margin: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <div class="content">
        <h1>Détail de la Commande #{{ $order->order_id }}</h1>
        <table>
            <tr>
                <th>ID de la commande</th>
                <td>{{ $order->order_id }}</td>
            </tr>
            <tr>
                <th>ID du client</th>
                <td>{{ $order->client_id }}</td>
            </tr>
            <tr>
                <th>Date de la commande</th>
                <td>{{ $order->date }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
