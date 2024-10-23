#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <DHT.h>

// Pengaturan WiFi
const char* ssid = "AndroidAP";
const char* password = "ok123456";

// Pengaturan DHT11
#define DHTPIN D4 // Pin yang terhubung ke DHT11
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);

// Buat objek WiFiClient
WiFiClient client;

void setup() {
  Serial.begin(115200);
  delay(10);

  // Menghubungkan ke WiFi
  Serial.println();
  Serial.println();
  Serial.print("Menghubungkan ke ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi terhubung");
  Serial.println("Alamat IP: ");
  Serial.println(WiFi.localIP());

  dht.begin();
}

void loop() {
  // Cek apakah terhubung ke WiFi
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;

    // Gunakan WiFiClient pada http.begin()
    http.begin(client, "http://192.168.102.159:8000/api/dht11");

    // Set header untuk tipe konten (misalnya JSON)
    http.addHeader("Content-Type", "application/json");

    // Membaca nilai dari DHT11
    float h = dht.readHumidity();
    float t = dht.readTemperature();

    // Jika ada masalah membaca sensor
    if (isnan(h) || isnan(t)) {
      Serial.println("Gagal membaca sensor DHT11!");
      return;
    }

    // Membuat data JSON yang akan dikirimkan
    String postData = "{\"temperature\":" + String(t) + ",\"humidity\":" + String(h) + "}";

    // Mengirimkan request POST
    int httpResponseCode = http.POST(postData);

    // Mengecek hasil dari server
    if (httpResponseCode > 0) {
      String response = http.getString();
      Serial.println(httpResponseCode);
      Serial.println(response);
    } else {
      Serial.print("Error pada request: ");
      Serial.println(httpResponseCode);
    }

    // Mengakhiri koneksi
    http.end();
  } else {
    Serial.println("WiFi tidak terhubung");
  }

  // Tunggu beberapa saat sebelum mengulangi pengiriman data
  delay(2000); // Mengirim data setiap 60 detik
}
