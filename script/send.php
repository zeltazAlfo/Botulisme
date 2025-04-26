<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $city = htmlspecialchars($_POST['city']);
    $codepost = htmlspecialchars($_POST['codepost']);
    $country = htmlspecialchars($_POST['country']);
    $request = htmlspecialchars($_POST['request']);
    $message = htmlspecialchars($_POST['message']);

    // Destinataire
    $to = "ton_email@domaine.com"; // <-- Mets ton email ici

    // Sujet du mail
    $subject = "New Contact Request from Website";

    // Corps du message
    $body = "
    You have received a new request:

    Name: $name
    Email: $email
    Phone: $phone
    Address: $adresse
    City: $city
    Postal Code: $codepost
    Country: $country
    Request Type: $request

    Message:
    $message
    ";

    // Headers (en-têtes email)
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envoi de l'email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Failed to send the message.";
    }
} else {
    echo "Invalid request.";
}
?>
