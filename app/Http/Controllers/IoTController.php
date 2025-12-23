<?php

namespace App\Http\Controllers;

use App\Models\SensorLog;
use Illuminate\Http\Request;

class IoTController extends Controller
{
    /**
     * Tampilkan halaman monitoring IoT.
     */
    public function index()
    {
        return view('iot.monitoring');
    }

    /**
     * Terima data dari perangkat IoT (ESP8266).
     *
     * Diharapkan payload (JSON atau x-www-form-urlencoded):
     * - temp (float)      : suhu dalam derajat Celcius
     * - is_fire (0 / 1)   : status sensor api
     *
     * Catatan: is_smoke saat ini di-hardcode false sesuai requirement.
     */
    public function storeData(Request $request)
    {
        $data = $request->validate([
            'temp' => ['required', 'numeric'],
            'is_fire' => ['required'],
        ]);

        $isFire = filter_var($data['is_fire'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

        $log = SensorLog::create([
            'temp' => (float) $data['temp'],
            'is_fire' => (bool) $isFire,
            'is_smoke' => false, // sesuai instruksi: hardcode false dulu
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data sensor berhasil disimpan.',
            'data' => $log,
        ]);
    }

    /**
     * Ambil data sensor terbaru dalam format JSON.
     */
    public function getLatestData()
    {
        $latest = SensorLog::latest()->first();

        if (! $latest) {
            return response()->json([
                'success' => true,
                'data' => null,
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $latest->id,
                'temp' => $latest->temp,
                'is_fire' => (bool) $latest->is_fire,
                'is_smoke' => (bool) $latest->is_smoke,
                'created_at' => $latest->created_at,
            ],
        ]);
    }
}


