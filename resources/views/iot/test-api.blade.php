<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test API Sensor IoT - Local</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold text-blue-600 mb-4">🧪 Test API Sensor IoT (Lokal)</h1>
            <p class="text-gray-600 mb-6">Halaman ini untuk test API tanpa Postman. Isi form di bawah ini untuk mengirim data sensor.</p>

            <!-- Form Input -->
            <form id="testForm" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Suhu (°C)</label>
                    <input 
                        type="number" 
                        step="0.1" 
                        name="temp" 
                        id="temp" 
                        value="26" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan suhu, contoh: 26.5">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status Api (Flame Sensor)</label>
                    <select 
                        name="is_fire" 
                        id="is_fire" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                        <option value="0">Tidak Ada Api (Aman)</option>
                        <option value="1">Ada Api (Bahaya!)</option>
                    </select>
                </div>

                <button 
                    type="submit" 
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    📤 Kirim Data ke API
                </button>
            </form>

            <!-- Hasil Response -->
            <div id="result" class="mt-6 hidden">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">📥 Response dari API:</h2>
                <div id="responseContent" class="bg-gray-50 border border-gray-200 rounded-md p-4">
                    <!-- Response akan muncul di sini -->
                </div>
            </div>

            <!-- Error Message -->
            <div id="error" class="mt-6 hidden">
                <div class="bg-red-50 border border-red-200 rounded-md p-4 text-red-700">
                    <strong>❌ Error:</strong> <span id="errorMessage"></span>
                </div>
            </div>

            <!-- Info -->
            <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-md">
                <h3 class="font-semibold text-blue-800 mb-2">ℹ️ Cara Pakai:</h3>
                <ol class="list-decimal list-inside space-y-1 text-sm text-blue-700">
                    <li>Isi form di atas dengan data sensor (suhu dan status api)</li>
                    <li>Klik tombol "Kirim Data ke API"</li>
                    <li>Lihat response di bawah form</li>
                    <li>Buka <a href="{{ route('iot.monitoring') }}" class="underline font-semibold">Dashboard Monitoring</a> untuk melihat data terbaru</li>
                </ol>
            </div>

            <!-- Link ke Dashboard -->
            <div class="mt-4 text-center">
                <a href="{{ route('iot.monitoring') }}" class="text-blue-600 hover:underline">
                    → Buka Dashboard Monitoring
                </a>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('testForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Reset tampilan
            document.getElementById('result').classList.add('hidden');
            document.getElementById('error').classList.add('hidden');
            
            // Ambil data dari form
            const formData = {
                temp: parseFloat(document.getElementById('temp').value),
                is_fire: parseInt(document.getElementById('is_fire').value)
            };

            try {
                // Kirim ke API lokal
                const response = await fetch('{{ url("/api/iot/sensor-data") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(formData)
                });

                const data = await response.json();

                if (response.ok) {
                    // Tampilkan response sukses
                    document.getElementById('responseContent').innerHTML = `
                        <div class="space-y-2">
                            <p><strong>✅ Status:</strong> <span class="text-green-600">${data.message || 'Berhasil!'}</span></p>
                            <p><strong>📊 Data yang dikirim:</strong></p>
                            <pre class="bg-white p-3 rounded border text-xs overflow-x-auto">${JSON.stringify(data.data, null, 2)}</pre>
                            <p class="text-sm text-gray-600 mt-2">💡 Data sudah tersimpan! Buka dashboard untuk melihat update.</p>
                        </div>
                    `;
                    document.getElementById('result').classList.remove('hidden');
                } else {
                    // Tampilkan error
                    document.getElementById('errorMessage').textContent = data.message || 'Terjadi kesalahan saat mengirim data';
                    document.getElementById('error').classList.remove('hidden');
                }
            } catch (error) {
                // Tampilkan error network
                document.getElementById('errorMessage').textContent = 'Tidak bisa terhubung ke API. Pastikan server Laravel berjalan!';
                document.getElementById('error').classList.remove('hidden');
                console.error('Error:', error);
            }
        });
    </script>
</body>
</html>

