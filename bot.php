<?php
// ============================================
// ربات NiloRSN - نسخه کامل با API
// ============================================

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$token = "BAJCIJ0LKGISKLKGGEBYKFABDSDHOJGVQFWLEIRXYHJJXDTMWIXAJOZXJNLWGNJW";
$group_id = "BAAHEDCDH0KZHHRLRHBPHQMLRALNYQXI";

// ============================================
// دریافت اکشن از اپ
// ============================================
$action = $_GET['action'] ?? '';
$text = $_POST['text'] ?? '';

// ============================================
// متن تبلیغاتی پیش‌فرض
// ============================================
$default_text = "🌸 سلام! وقت بخیر 🌸

🎮 برنامه بازی، سایت، آموزش برنامه‌نویسی
🔥 پر از چالش با جوایز بسیار بالا
💎 کاملاً رایگان

📢 به کانال RSN بپیوندید:
@RSN_ONE

✨ منتظرت هستیم ✨";

// ============================================
// توابع ارسال
// ============================================
function sendMessage($chat_id, $text) {
    global $token;
    $url = "https://rubika.ir/api/bot/$token/sendMessage";
    
    $data = [
        'chat_id' => $chat_id,
        'text' => $text
    ];
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
}

// ============================================
// مدیریت اکشن‌ها
// ============================================
switch ($action) {
    
    // ===== شروع ربات =====
    case 'start':
        file_put_contents('bot_status.txt', 'active');
        echo json_encode(['status' => 'active', 'message' => 'ربات فعال شد']);
        break;
    
    // ===== توقف ربات =====
    case 'stop':
        file_put_contents('bot_status.txt', 'stopped');
        echo json_encode(['status' => 'stopped', 'message' => 'ربات متوقف شد']);
        break;
    
    // ===== دریافت وضعیت =====
    case 'status':
        $status = file_get_contents('bot_status.txt') ?: 'stopped';
        echo json_encode(['status' => $status]);
        break;
    
    // ===== ارسال پیام =====
    case 'send':
        $msg = $text ?: $default_text;
        $result = sendMessage($group_id, $msg);
        echo json_encode(['sent' => true, 'message' => 'پیام ارسال شد']);
        break;
    
    // ===== ارسال خودکار (Cron) =====
    case 'auto':
        $status = file_get_contents('bot_status.txt') ?: 'stopped';
        if ($status == 'active') {
            sendMessage($group_id, $default_text);
            echo "✅ پیام خودکار ارسال شد!";
        } else {
            echo "⏹️ ربات متوقف است";
        }
        break;
    
    default:
        echo json_encode(['error' => 'اکشن نامعتبر']);
}
?>
