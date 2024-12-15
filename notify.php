<?php
// Телеграм токен и ID чата
$telegram_token = '7450307110:AAEDENilH7kf2mlersG4eWt1Om6npdE9upo';
$chat_id = '-4148645511';

// Проверка типа запроса
$request = json_decode(file_get_contents('php://input'), true);

// Получение данных о пользователе
$ip = $_SERVER['REMOTE_ADDR'];
$time = date('d M H:i:s'); // Красивое форматирование времени
$details = json_decode(file_get_contents("http://ip-api.com/json/$ip"));

// Получение данных о сайте и устройстве
$site_name = $_SERVER['HTTP_HOST'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];

// Функция для преобразования страны в флаг-эмоджи
function countryToFlag($countryCode) {
    return mb_convert_encoding('&#'.(127397 + ord($countryCode[0])).';', 'UTF-8', 'HTML-ENTITIES') .
           mb_convert_encoding('&#'.(127397 + ord($countryCode[1])).';', 'UTF-8', 'HTML-ENTITIES');
}

$country_flag = isset($details->countryCode) ? countryToFlag($details->countryCode) : '';
$location = $country_flag . ' ' . ($details->city ?? 'Неизвестно');

// Определение типа устройства
if (strpos($user_agent, 'iPhone') !== false) {
    $device = 'iPhone🍏';
} elseif (strpos($user_agent, 'iPad') !== false) {
    $device = 'iPad🍏';
} elseif (strpos($user_agent, 'Android') !== false) {
    $device = 'Android🤖';
} elseif (strpos($user_agent, 'Macintosh') !== false || strpos($user_agent, 'Mac OS') !== false) {
    $device = 'Mac🍎';
} elseif (strpos($user_agent, 'Windows') !== false) {
    $device = 'Windows🖥️';
} elseif (strpos($user_agent, 'Linux') !== false) {
    $device = 'Linux🐧';
} else {
    $device = 'Неопознанное устройство📟';
}

// Проверка действия
if (isset($request['action']) && $request['action'] === 'button_clicked') {
    $message = "🔘 _Кнопка нажата на сайте_ $site_name \n🗺️ _Локация:_ $location \n⚙️ _Девайс:_ $device \n⏰ _Время:_ $time";
} else {
    $message = "🆕 _Даун открыл_ $site_name \n🗺️ _Локация:_ $location \n⚙️ _Девайс:_ $device \n⏰ _Время:_ $time";
}

// Отправка сообщения в Telegram
$telegram_url = "https://api.telegram.org/bot$telegram_token/sendMessage?chat_id=$chat_id&text=" . urlencode($message) . "&parse_mode=Markdown";
file_get_contents($telegram_url);
?>
