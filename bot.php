<!DOCTYPE html><html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><title>تست سایت RSN</title>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #0b0b12;
        color: white;
        font-family: Tahoma, sans-serif;
    }

    .card {
        width: 90%;
        max-width: 500px;
        padding: 40px 25px;
        text-align: center;
        border-radius: 25px;
        background: #151522;
        box-shadow: 0 0 40px rgba(120, 70, 255, 0.25);
    }

    h1 {
        font-size: 42px;
        margin-bottom: 15px;
    }

    p {
        color: #aaa;
        font-size: 17px;
        margin-bottom: 25px;
    }

    button {
        border: none;
        padding: 14px 30px;
        border-radius: 12px;
        background: #704cff;
        color: white;
        font-size: 16px;
        cursor: pointer;
    }

    button:active {
        transform: scale(0.95);
    }

    #result {
        margin-top: 20px;
        color: #55ff99;
        min-height: 24px;
    }
</style>

</head><body><div class="card">
    <h1>RSN</h1>

    <p>
        اگر این صفحه را می‌بینی، سایت با موفقیت اجرا شده است.
    </p>

    <button onclick="testSite()">
        تست سایت
    </button>

    <div id="result"></div>
</div>

<script>
    function testSite() {
        document.getElementById("result").textContent =
            "✅ HTML + CSS + JavaScript درست کار می‌کند!";
    }
</script>

</body>
</html>
