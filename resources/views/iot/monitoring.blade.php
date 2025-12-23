@extends('layouts.main2')
@section('content')

<!-- Tailwind CDN khusus untuk halaman ini -->
<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-slate-50 px-4 py-8">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl md:text-3xl font-bold text-blue-700 mb-6">
            Status & Monitoring Sensor IoT
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card Sensor Suhu -->
            <div class="bg-white rounded-xl shadow-sm border-l-4 border-blue-500 p-6 flex flex-col justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-blue-700 mb-1">Sensor Suhu</h2>
                    <p class="text-sm text-slate-500 mb-1">Lokasi: Ruang Rawat Inap</p>
                    <p class="text-sm text-slate-600">
                        Suhu:
                        <span id="temp-value" class="font-semibold text-green-600">- °C</span>
                    </p>
                </div>
                <div class="mt-4">
                    <span id="temp-status-badge"
                          class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                        Status Normal
                    </span>
                </div>
            </div>

            <!-- Card Sensor Asap -->
            <div class="bg-white rounded-xl shadow-sm border-l-4 border-amber-400 p-6 flex flex-col justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-amber-600 mb-1">Sensor Asap</h2>
                    <p class="text-sm text-slate-500 mb-1">Lokasi: Ruang Farmasi</p>
                    <p class="text-sm text-slate-600">
                        Kondisi:
                        <span id="smoke-condition-text" class="font-semibold text-emerald-600">Aman</span>
                    </p>
                </div>
                <div class="mt-4">
                    <span id="smoke-status-badge"
                          class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                        Tidak Terdeteksi
                    </span>
                </div>
            </div>

            <!-- Card Sensor Api -->
            <div class="bg-white rounded-xl shadow-sm border-l-4 border-red-500 p-6 flex flex-col justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-red-600 mb-1">Sensor Api</h2>
                    <p class="text-sm text-slate-500 mb-1">Area: Seluruh Klinik</p>
                    <p class="text-sm text-slate-600">
                        Status:
                        <span id="fire-condition-text" class="font-semibold text-emerald-600">Aman</span>
                    </p>
                </div>
                <div class="mt-4">
                    <span id="fire-status-badge"
                          class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700">
                        Tidak Ada Api
                    </span>
                </div>
            </div>
        </div>

        <p class="mt-6 text-xs text-slate-400">
            Data diperbarui otomatis setiap 2 detik dari endpoint <code>/api/get-latest-sensor</code>.
        </p>
    </div>
</div>

<script>
    async function fetchLatestSensor() {
        try {
            const response = await fetch('{{ url('/api/get-latest-sensor') }}');
            if (!response.ok) {
                console.error('Gagal mengambil data sensor:', response.status);
                return;
            }

            const json = await response.json();

            if (!json.success || !json.data) {
                return;
            }

            const data = json.data;

            // Update suhu
            const tempValueEl = document.getElementById('temp-value');
            const tempStatusBadgeEl = document.getElementById('temp-status-badge');

            if (tempValueEl) {
                tempValueEl.textContent = `${data.temp.toFixed(1)}°C`;
            }

            // Logika sederhana status suhu
            let tempStatusText = 'Status Normal';
            let tempStatusClasses = 'inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold ';

            if (data.temp >= 30) {
                tempStatusText = 'Suhu Tinggi';
                tempStatusClasses += 'bg-amber-100 text-amber-700';
            } else if (data.temp <= 18) {
                tempStatusText = 'Suhu Rendah';
                tempStatusClasses += 'bg-sky-100 text-sky-700';
            } else {
                tempStatusClasses += 'bg-emerald-100 text-emerald-700';
            }

            if (tempStatusBadgeEl) {
                tempStatusBadgeEl.textContent = tempStatusText;
                tempStatusBadgeEl.className = tempStatusClasses;
            }

            // Smoke (sementara selalu aman karena is_smoke = false)
            const smokeConditionTextEl = document.getElementById('smoke-condition-text');
            const smokeStatusBadgeEl = document.getElementById('smoke-status-badge');

            if (smokeConditionTextEl) {
                smokeConditionTextEl.textContent = data.is_smoke ? 'Bahaya' : 'Aman';
                smokeConditionTextEl.className = 'font-semibold ' + (data.is_smoke ? 'text-red-600' : 'text-emerald-600');
            }

            if (smokeStatusBadgeEl) {
                smokeStatusBadgeEl.textContent = data.is_smoke ? 'Asap Terdeteksi' : 'Tidak Terdeteksi';
                smokeStatusBadgeEl.className = 'inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold ' +
                    (data.is_smoke ? 'bg-red-100 text-red-700' : 'bg-emerald-100 text-emerald-700');
            }

            // Fire
            const fireConditionTextEl = document.getElementById('fire-condition-text');
            const fireStatusBadgeEl = document.getElementById('fire-status-badge');

            const isFire = Boolean(data.is_fire);

            if (fireConditionTextEl) {
                fireConditionTextEl.textContent = isFire ? 'Bahaya' : 'Aman';
                fireConditionTextEl.className = 'font-semibold ' + (isFire ? 'text-red-600' : 'text-emerald-600');
            }

            if (fireStatusBadgeEl) {
                fireStatusBadgeEl.textContent = isFire ? 'Api Terdeteksi' : 'Tidak Ada Api';
                fireStatusBadgeEl.className = 'inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold ' +
                    (isFire ? 'bg-red-100 text-red-700' : 'bg-emerald-100 text-emerald-700');
            }
        } catch (error) {
            console.error('Error fetchLatestSensor:', error);
        }
    }

    // Panggil pertama kali
    fetchLatestSensor();
    // Update setiap 2 detik
    setInterval(fetchLatestSensor, 2000);
</script>

@endsection


