# List Perubahan Project IoT Laravel

Catatan ini berisi daftar file yang ditambah/diubah oleh AI untuk fitur monitoring IoT (sensor suhu, api, asap) beserta deskripsi singkat perubahannya.

## 1. Database & Model

- **File**: `database/migrations/2025_12_23_000000_create_sensor_logs_table.php`  
  - **Jenis**: Migration baru  
  - **Perubahan**:
    - Membuat tabel `sensor_logs` dengan kolom:
      - `id`
      - `temp` (float)
      - `is_fire` (boolean, default `false`)
      - `is_smoke` (boolean, default `false`)
      - `timestamps` (`created_at`, `updated_at`)

- **File**: `app/Models/SensorLog.php`  
  - **Jenis**: Model baru  
  - **Perubahan**:
    - Menambahkan model Eloquent `SensorLog` dengan properti:
      - `protected $table = 'sensor_logs';`
      - `$fillable = ['temp', 'is_fire', 'is_smoke'];`
      - `$casts = ['temp' => 'float', 'is_fire' => 'boolean', 'is_smoke' => 'boolean'];`

## 2. Controller & Routing IoT

- **File**: `app/Http/Controllers/IoTController.php`  
  - **Jenis**: Controller baru  
  - **Perubahan**:
    - Method `index()` untuk menampilkan halaman monitoring `iot.monitoring`.
    - Method `storeData(Request $request)` untuk menerima POST data dari perangkat IoT (field utama: `temp`, `is_fire`, `is_smoke` di-hardcode `false`).
    - Method `getLatestData()` untuk mengembalikan JSON data sensor terbaru dari tabel `sensor_logs`.
    - Method `testAPI()` untuk menampilkan halaman test API lokal (tanpa Postman).

- **File**: `routes/api.php`  
  - **Jenis**: Append route di bagian bawah tanpa mengubah route lama  
  - **Perubahan**:
    - `use App\Http\Controllers\IoTController;`
    - Route POST `/api/iot/sensor-data` → `IoTController@storeData` (endpoint kirim data dari IoT).
    - Route GET `/api/get-latest-sensor` → `IoTController@getLatestData` (dipakai dashboard real-time).

- **File**: `routes/web.php`  
  - **Jenis**: Append route di bagian bawah tanpa mengubah route lama  
  - **Perubahan**:
    - `use App\Http\Controllers\IoTController;`
    - Route GET `/iot/monitoring` → `IoTController@index` dengan nama route `iot.monitoring`.
    - Route GET `/iot/test-api` → `IoTController@testAPI` dengan nama route `iot.test-api` (halaman test API lokal tanpa Postman).

## 3. Frontend Dashboard Monitoring

- **File**: `resources/views/iot/monitoring.blade.php`  
  - **Jenis**: View Blade baru  
  - **Perubahan**:
    - Meng-extend layout `layouts.main2`.
    - Menggunakan Tailwind (via CDN) untuk membuat 3 card:
      - **Sensor Suhu** (border biru) dengan teks suhu dan badge status suhu.
      - **Sensor Asap** (border kuning) dengan teks kondisi dan badge "Tidak Terdeteksi / Asap Terdeteksi".
      - **Sensor Api** (border merah) dengan teks status dan badge "Tidak Ada Api / Api Terdeteksi".
    - JavaScript `fetch()` ke endpoint `GET /api/get-latest-sensor` setiap 2 detik untuk:
      - Mengupdate nilai suhu.
      - Mengupdate status aman/bahaya untuk asap & api (badge hijau/merah).

- **File**: `resources/views/iot/test-api.blade.php`  
  - **Jenis**: View Blade baru untuk test API lokal  
  - **Perubahan**:
    - Halaman web sederhana dengan form HTML untuk test API tanpa Postman.
    - Form input: suhu (number) dan status api (select: Aman/Bahaya).
    - Tombol submit yang mengirim POST request ke `/api/iot/sensor-data` via JavaScript fetch.
    - Menampilkan response dari API (sukses/error) secara langsung di halaman.
    - Link ke dashboard monitoring untuk melihat data yang sudah dikirim.
    - URL akses: `/iot/test-api` (route name: `iot.test-api`).

## 4. Program Perangkat IoT (ESP8266)

- **File**: `iot_monitoring_esp8266.ino`  
  - **Jenis**: Sketch Arduino baru untuk NodeMCU/ESP8266  
  - **Perubahan**:
    - Koneksi ke WiFi sesuai konfigurasi `WIFI_SSID` dan `WIFI_PASSWORD`.
    - Baca sensor DHT11 (suhu), flame sensor (api), dan kontrol buzzer.
    - Mengirim data ke endpoint Laravel `API_URL` (contoh: `http://IP_SERVER_ANDA/api/iot/sensor-data`) dengan payload JSON:
      - `temp` → nilai suhu (float, °C)
      - `is_fire` → `1` jika api terdeteksi, `0` jika aman
    - Interval pengiriman data default: setiap 2 detik.

## 5. Cara Menghubungkan Program IoT ke API Laravel

### A. Test API Lokal (Tanpa Postman - Untuk Pemula)

- **1. Buka halaman test API di browser**:
  - URL: `http://ALAMAT_SERVER_ANDA/iot/test-api`
  - Contoh: `http://localhost/iot/test-api` atau `http://192.168.1.10/iot/test-api`
- **2. Isi form**:
  - Masukkan suhu (contoh: `26.5`)
  - Pilih status api (Aman atau Bahaya)
  - Klik tombol "Kirim Data ke API"
- **3. Lihat response**:
  - Jika berhasil, akan muncul pesan sukses dan data yang tersimpan
  - Jika error, akan muncul pesan error
- **4. Buka dashboard**:
  - Klik link "Buka Dashboard Monitoring" atau buka langsung: `http://ALAMAT_SERVER_ANDA/iot/monitoring`
  - Dashboard akan menampilkan data terbaru yang sudah dikirim

### B. Koneksi dari Perangkat IoT (ESP8266)

- **1. Jalankan migrasi** di Laravel: `php artisan migrate` (pastikan versi PHP sesuai requirement Laravel di project ini).
- **2. Pastikan URL API bisa diakses** dari jaringan lokal, contoh:
  - `http://192.168.1.10/api/iot/sensor-data`
- **3. Edit file** `iot_monitoring_esp8266.ino`:
  - Ganti `WIFI_SSID` dan `WIFI_PASSWORD` dengan nama & password WiFi Anda.
  - Ganti `API_URL` dengan URL lengkap endpoint API Laravel Anda, misalnya:
    - `const char* API_URL = "http://192.168.1.10/api/iot/sensor-data";`
- **4. Upload sketch** ke board ESP8266/NodeMCU.
- **5. Buka halaman dashboard** di browser:
  - `http://ALAMAT_SERVER_ANDA/iot/monitoring`
  - Dashboard akan melakukan `fetch()` ke `/api/get-latest-sensor` setiap 2 detik dan menampilkan data terkini.

---

Catatan ini akan diperbarui setiap kali ada file baru yang ditambah/diubah untuk fitur IoT ini.


