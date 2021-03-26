<!DOCTYPE html>
<html>

<head>
    <title>Leaflet Draw</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://d19vzq90twjlae.cloudfront.net/leaflet-0.7/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <span>
            <h3>Saving Coordinates using leafletJS - Laravel - MySQL</h3>
        </span>
        <form action="">

            <div id="map" style="height: 600px"></div>
            <br>
            <div>
                <label>The layer To Be Stored:</label>
                <input id="polygon" type="text" class="form-control" name="polygon" value="{{request('polygon')}}">
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
    </div>
    </form>

    <script>
        ///Setting the center of the map
        var center = [7.2906, 80.6337];

        // Create the map
        var map = L.map('map').setView(center, 10);

        // Set up the Open Street Map layer 
        L.tileLayer(
            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
                maxZoom: 18
            }).addTo(map);

        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            position: 'topright',
            draw: {
                polygon: {
                    shapeOptions: {
                        color: 'purple' //polygons being drawn will be purple color
                    },
                    allowIntersection: false,
                    drawError: {
                        color: 'orange',
                        timeout: 1000
                    },
                    showArea: true, //the area of the polygon will be displayed as it is drawn.
                    metric: false,
                    repeatMode: true
                },
                polyline: {
                    shapeOptions: {
                        color: 'red'
                    },
                },
                circlemarker: false, //circlemarker type has been disabled.
                rect: {
                    shapeOptions: {
                        color: 'green'
                    },
                },
                circle: false,
            },
            edit: {
                featureGroup: drawnItems
            }
        });
        map.addControl(drawControl);

        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;

            drawnItems.addLayer(layer);
            $('#polygon').val(JSON.stringify(layer.toGeoJSON()));
        });
    </script>
</body>

</html>