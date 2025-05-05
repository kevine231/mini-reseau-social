<!DOCTYPE html>
<html>
<head>
    <title>Nouveau message de contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #4F46E5;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: #f9fafb;
            padding: 20px;
            border: 1px solid #e5e7eb;
            border-radius: 0 0 5px 5px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #6b7280;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>Nouveau message de contact</h1>
</div>

<div class="content">
    <p><strong>De :</strong> {{ $name }} ({{ $email }})</p>

    <h2>Message :</h2>
    <p>{{ $message }}</p>
</div>

<div class="footer">
    <p>Ce message a été envoyé depuis le formulaire de contact de Mini Réseau Social.</p>
    <p>&copy; {{ date('Y') }} Mini Réseau Social. Tous droits réservés.</p>
</div>
</body>
</html>
