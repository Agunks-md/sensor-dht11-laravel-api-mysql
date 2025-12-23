#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>
#include <DHT.h>

// -----------------------------
// KONFIGURASI WIFI & API
// -----------------------------
const char* WIFI_SSID     = "NAMA_WIFI_ANDA";
const char* WIFI_PASSWORD = "PASSWORD_WIFI_ANDA";

// Ganti dengan URL API Laravel Anda
// Contoh: "http://192.168.1.10/sensor-dht11-laravel-api-mysql/public/api/iot/sensor-data"
const char* API_URL = "http://ALAMAT_SERVER_ANDA/api/iot/sensor-data";

// -----------------------------
// KONFIGURASI SENSOR
// -----------------------------
#define DHTPIN D4       // Pin data DHT11
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);

const int FLAME_PIN = D5;   // Pin digital untuk flame sensor
const int BUZZER_PIN = D6;  // Pin buzzer

void setup() {
  Serial.begin(115200);
  delay(1000);

  pinMode(FLAME_PIN, INPUT);
  pinMode(BUZZER_PIN, OUTPUT);
  digitalWrite(BUZZER_PIN, LOW);

  dht.begin();

  // Koneksi WiFi
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  Serial.print("Menghubungkan ke WiFi");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println();
  Serial.print("Terhubung! IP: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  if (WiFi.status() != WL_CONNECTED) {
    // Coba reconnect jika putus
    WiFi.disconnect();
    WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
    delay(1000);
    return;
  }

  // Baca sensor suhu
  float h = dht.readHumidity();
  float t = dht.readTemperature(); // Celcius

  // Baca sensor api (flame)
  int flameValue = digitalRead(FLAME_PIN);
  bool isFire = (flameValue == LOW); // tergantung modul: LOW = api terdeteksi

  // Kontrol buzzer jika api terdeteksi
  if (isFire) {
    digitalWrite(BUZZER_PIN, HIGH);
  } else {
    digitalWrite(BUZZER_PIN, LOW);
  }

  if (isnan(t) || isnan(h)) {
    Serial.println("Gagal baca DHT11");
    delay(2000);
    return;
  }

  // Kirim data ke API Laravel
  WiFiClient client;
  HTTPClient http;

  if (http.begin(client, API_URL)) {
    http.addHeader("Content-Type", "application/json");

    StaticJsonDocument<200> doc;
    doc["temp"] = t;
    doc["is_fire"] = isFire ? 1 : 0;
    // is_smoke sengaja tidak dikirim (di-backend di-hardcode false)

    String payload;
    serializeJson(doc, payload);

    int httpCode = http.POST(payload);

    Serial.print("Kirim data: ");
    Serial.println(payload);
    Serial.print("HTTP Response code: ");
    Serial.println(httpCode);

    if (httpCode > 0) {
      String response = http.getString();
      Serial.println("Respon server:");
      Serial.println(response);
    } else {
      Serial.print("Error HTTP: ");
      Serial.println(http.errorToString(httpCode));
    }

    http.end();
  } else {
    Serial.println("Gagal konek ke API URL");
  }

  // Interval kirim data (contoh: 2 detik)
  delay(2000);
}


