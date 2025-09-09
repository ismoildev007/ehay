<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madina - Mahsulot Bot</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 2rem; }
        button { padding: 0.5rem 1rem; margin-bottom: 1rem; }
        input, textarea { display: block; width: 100%; margin-bottom: 1rem; padding: 0.5rem; }
        #status { font-weight: bold; margin-bottom: 1rem; color: green; }
    </style>
</head>
<body>

<h1>🧠 Madina - Ovozli yordamchi</h1>

<button id="start-btn">🎙 Madina bilan gaplashish</button>
<div id="status">Boshlash uchun tugmani bosing</div>

<form id="product-form">
    <input type="text" id="name" placeholder="Mahsulot nomi" required>
    <textarea id="description" placeholder="Mahsulot tavsifi" required></textarea>
    <input type="number" id="price" placeholder="Narxi (so'm)" required>
    <button type="submit">💾 Saqlash</button>
</form>

<script>
    const startBtn = document.getElementById('start-btn');
    const statusDiv = document.getElementById('status');
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    const recognition = new SpeechRecognition();
    recognition.lang = 'uz-UZ'; // Ovozli kirish tili
    recognition.interimResults = false;
    recognition.continuous = false;

    startBtn.addEventListener('click', () => {
        speak("Labbe, eshitaman. Sizga yordam berishga tayyorman.");
        recognition.start();
    });

    recognition.onresult = (event) => {
        const transcript = event.results[0][0].transcript.toLowerCase();
        statusDiv.textContent = `Siz dedingiz: "${transcript}"`;

        let nameMatch = transcript.match(/nom(?:i|ini)?\s*(\S+)/i);
        let descMatch = transcript.match(/tavsif(?:i|ini)?\s*(.+?)(?:narx|$)/i);
        let priceMatch = transcript.match(/narx(?:i|ini)?\s*(\d+)/i);

        if (nameMatch) document.getElementById('name').value = nameMatch[1];
        if (descMatch) document.getElementById('description').value = descMatch[1].trim();
        if (priceMatch) document.getElementById('price').value = priceMatch[1];

        speak("Mahsulot ma'lumotlari kiritildi. Yana qanday yordam bera olishim mumkin?");
    };

    function speak(text) {
        const synth = window.speechSynthesis;
        const utter = new SpeechSynthesisUtterance(text);
        utter.lang = 'uz-UZ';
        synth.speak(utter);
    }

    document.getElementById('product-form').addEventListener('submit', function (e) {
        e.preventDefault();

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const data = {
            name: document.getElementById('name').value,
            description: document.getElementById('description').value,
            price: document.getElementById('price').value
        };

        fetch('/tests', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(res => {
                speak("Mahsulot saqlandi. Yana qanday yordam bera olishim mumkin?");
                document.getElementById('product-form').reset();
                statusDiv.textContent = "Mahsulot saqlandi!";
            })
            .catch(error => {
                console.error(error);
                speak("Xatolik yuz berdi.");
                statusDiv.textContent = "Xatolik yuz berdi!";
            });
    });
</script>

</body>
</html>
