<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = nl2br(htmlspecialchars($_POST["message"]));

    $to = "lin.maicon@gmail.com"; // Seu e-mail de destino
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $body = "
        <html>
        <head>
            <title>$subject</title>
        </head>
        <body>
            <h2>Nova mensagem recebida</h2>
            <p><strong>De:</strong> $email</p>
            <p><strong>Assunto:</strong> $subject</p>
            <p><strong>Mensagem:</strong></p>
            <p>$message</p>
        </body>
        </html>
    ";

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Erro ao enviar mensagem.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Acesso inválido!'); window.history.back();</script>";
}
?>
