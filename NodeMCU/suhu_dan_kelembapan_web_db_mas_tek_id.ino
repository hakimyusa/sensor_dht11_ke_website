#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
#include "DHT.h"

const char *ssid = "Yusarin";  
const char *password = "YusaYusarin123";

#define DHTPIN D4
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);

WiFiClient client;

void setup() {
  dht.begin();
  delay(1000);
  Serial.begin(115200);
  WiFi.mode(WIFI_OFF); 
  delay(1000);
  WiFi.mode(WIFI_STA); 
  WiFi.begin(ssid, password);    
  Serial.println("");
  Serial.print("Connecting");

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP()); 
}

void loop() {
  HTTPClient http;

  String temperature, humidity, getData, Link;

  temperature = dht.readTemperature();
  humidity = dht.readHumidity();

  getData = "?suhu=" + temperature + "&kelembaban=" + humidity ; 
  // Link = "http://yusayusa.000webhostapp.com/input.php" + getData; //000webhostapp, Berhasil // Akun Kena Banned 
  Link = "http://sensorsuhumj.000webhostapp.com/input.php" + getData; //000webhostapp, berhasil
  // Link = "http://yusarin.my.id/suhu/input.php" + getData; // InfinityFree Host, Error
  // Link = "http://192.168.43.180/input.php" + getData; // Localhost
  // Link = "http://suhu.yusarin.my.id/input.php" + getData; // Self Host, Error
  
  
  http.begin(client, Link);
  
  int httpCode = http.GET();           
  String payload = http.getString();

  Serial.println(httpCode);   
  Serial.println(payload);  

  http.end(); 
  
  delay(500);  
}
