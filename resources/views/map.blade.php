<!-- resources/views/map.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Map</title>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.0/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.0/dist/MarkerCluster.Default.css" />
    <style>
        body {
            display: flex;
            margin: 0;
        }
        #map {
            height: 100vh;
            width: 100%;
            transition: width 0.3s;
        }
        #panel {
            width: 300px;
            max-width: 300px;
            padding: 20px;
            background-color: #f7f7f7;
            overflow-y: auto;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1000;
            transition: transform 0.3s;
            transform: translateX(0);
        }
        #panel.collapsed {
            transform: translateX(-100%);
        }
        #panel h2 {
            margin-top: 0;
        }
        .location-item {
            margin-bottom: 10px;
            cursor: pointer;
        }
        #collapse-button {
            position: absolute;
            top: 20px;
            right: -40px;
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            z-index: 1001;
        }
    </style>
    <!-- resources/views/map.blade.php -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>

</head>
<body>
    <div id="map"></div>
    <div id="panel">
        <h2>Locations</h2>
        <div class="location-item" onclick="focusOnLocation([-6.1256, 106.6559], 'Terminal 1')">Terminal 1</div>
        <div class="location-item" onclick="focusOnLocation([-6.1270, 106.6565], 'Terminal 2')">Terminal 2</div>
        <div class="location-item" onclick="focusOnLocation([-6.1300, 106.6575], 'Terminal 3')">Terminal 3</div>
        <div class="location-item" onclick="focusOnLocation([-6.1256, 106.6590], 'Starbucks')">Starbucks</div>
        <div class="location-item" onclick="focusOnLocation([-6.1260, 106.6600], 'McDonald\'s')">McDonald's</div>
    </div>

    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.5.0/dist/leaflet.markercluster-src.js"></script>
    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-6.1256, 106.6559], 16); // Koordinat Bandara Soekarno-Hatta

        // Menambahkan tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Menambahkan marker di beberapa lokasi
        var markers = {
            'Terminal 1': L.marker([-6.1256, 106.6559]).bindPopup('Terminal 1'),
            'Terminal 2': L.marker([-6.1270, 106.6565]).bindPopup('Terminal 2'),
            'Terminal 3': L.marker([-6.1300, 106.6575]).bindPopup('Terminal 3'),
            'Starbucks': L.marker([-6.1256, 106.6590]).bindPopup('Starbucks'),
            'McDonald\'s': L.marker([-6.1260, 106.6600]).bindPopup('McDonald\'s')
        };

         // Menambahkan marker ke peta
         for (var key in markers) {
            markers[key].addTo(map);
        }

        // Fungsi untuk memfokuskan peta ke lokasi tertentu
        function focusOnLocation(latlng, popupText) {
            map.setView(latlng, 18);
            markers[popupText].openPopup();
        }

        // Fungsi untuk meng-collapse atau expand panel
        function togglePanel() {
            var panel = document.getElementById('panel');
            var mapDiv = document.getElementById('map');
            if (panel.classList.contains('collapsed')) {
                panel.classList.remove('collapsed');
                mapDiv.style.width = 'calc(100% - 300px)';
            } else {
                panel.classList.add('collapsed');
                mapDiv.style.width = '100%';
            }
        }

        // Fungsi untuk memfokuskan peta ke lokasi tertentu
        function focusOnLocation(latlng, popupText) {
            map.setView(latlng, 18);
            markers[popupText].openPopup();
        }

        // Menambahkan marker
        L.marker([-6.1256, 106.6559]).addTo(map)
            .bindPopup('Bandara Soekarno-Hatta')
            .openPopup();
        
        // Contoh fitur lainnya seperti polyline, polygon, circle, dll.
        // Misalnya, menambahkan polyline
        var latlngspik1 = [
            [-6.1256, 106.6559],
            [-6.110904256024234, 106.74611449149026],

        ];
        var latlngspik2 = [
            [-6.1256, 106.6559],
            [-6.05684461618389, 106.67886908049586],

        ];
        var polylinepik1 = L.polyline(latlngspik1, {color: 'red'}).addTo(map);
        var polylinepik2 = L.polyline(latlngspik2, {color: 'blue'}).addTo(map);

        // Atau menambahkan circle
        var circle = L.circle([-6.1256, 106.6559], {
            color: 'blue',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 1700
        }).addTo(map);

        // Menambahkan layer control jika Anda ingin menambahkan beberapa layer
        var baseMaps = {
            "OpenStreetMap": L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')
        };
        var overlayMaps = {
            "Lingkaran": circle,
            "Ke Apart Sarah": polylinepik1,
            "Ke Apart Ci Win": polylinepik2,
            
        };
        L.control.layers(baseMaps, overlayMaps).addTo(map);
        
    </script>
</body>
</html>
