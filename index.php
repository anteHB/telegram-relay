<?php
// Simple Telegram Relay
$botToken = "YOUR_BOT_TOKEN";
$chatId = "YOUR_CHAT_ID";

$name = $_GET['name'] ?? 'No name';
$phone = $_GET['phone'] ?? 'No phone';
$time = date("Y-m-d H:i:s");

$message = "🟢 *New Registration!*\n".
           "👤 *Name:* $name\n".
           "📞 *Phone:* $phone\n".
           "⏰ *Time:* $time";

$url = "https://api.telegram.org/bot$botToken/sendMessage";

// Send request with cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'chat_id' => $chatId,
    'text' => $message,
    'parse_mode' => 'Markdown'
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

echo "Telegram API Response: " . $response;