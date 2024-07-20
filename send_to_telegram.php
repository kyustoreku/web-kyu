<?php
// Token bot Telegram yang diberikan oleh BotFather
$botToken = "YOUR_BOT_TOKEN_HERE";

// ID chat Telegram yang akan menerima pesan
$chatId = "YOUR_CHAT_ID_HERE";

// Mengambil data dari form
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

// Membuat pesan
$text = "Nama: $name\nEmail: $email\nPesan: $message";

// URL API Telegram
$url = "https://api.telegram.org/bot$botToken/sendMessage";

// Data yang dikirim ke API Telegram
$data = [
    'chat_id' => $chatId,
    'text' => $text,
    'parse_mode' => 'HTML'
];

// Inisialisasi cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Mengirim data ke Telegram
$response = curl_exec($ch);
curl_close($ch);

// Mengecek apakah pesan berhasil dikirim
if ($response) {
    echo "Pesan berhasil dikirim!";
} else {
    echo "Terjadi kesalahan. Pesan gagal dikirim.";
}
?>
