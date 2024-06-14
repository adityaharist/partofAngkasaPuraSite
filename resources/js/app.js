import './bootstrap';
// resources/js/app.js
import 'leaflet/dist/leaflet.css';
import L from 'leaflet';

// Inisialisasi peta
document.addEventListener('DOMContentLoaded', function() {
    var map = L.map('map').setView([35.5493932, 139.7798386], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    L.marker([35.5493932, 139.7798386]).addTo(map)
        .bindPopup('Haneda Airport')
        .openPopup();
});
