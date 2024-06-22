/* Google maps */
import {Loader, LoaderOptions} from 'google-maps';
// or const {Loader} = require('google-maps'); without typescript


const hqLat = 43.8552164459567, hqLon = 18.38745423505708;
const options = {/* todo */};
const loader = new Loader('AIzaSyAApiBLPehhhJkDFqzlfNGN99n18N4PZxA', options);

loader.load().then(function (google) {
    let map = new google.maps.Map(document.getElementById('inside__map'), {
        center: {lat: hqLat, lng: hqLon},
        zoom: 16,
        disableDefaultUI: true,
        // fullscreenControl: false,
        styles: [
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#e9e9e9"
                    },
                    {
                        "lightness": 17
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#f5f5f5"
                    },
                    {
                        "lightness": 20
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 17
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 29
                    },
                    {
                        "weight": 0.2
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 18
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 16
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#f5f5f5"
                    },
                    {
                        "lightness": 21
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#dedede"
                    },
                    {
                        "lightness": 21
                    }
                ]
            },
            {
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "color": "#ffffff"
                    },
                    {
                        "lightness": 16
                    }
                ]
            },
            {
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "saturation": 36
                    },
                    {
                        "color": "#333333"
                    },
                    {
                        "lightness": 40
                    }
                ]
            },
            {
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#f2f2f2"
                    },
                    {
                        "lightness": 19
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#fefefe"
                    },
                    {
                        "lightness": 20
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "#fefefe"
                    },
                    {
                        "lightness": 17
                    },
                    {
                        "weight": 1.2
                    }
                ]
            }
        ]
    });

    let location = new google.maps.LatLng(hqLat, hqLon);
    let marker = new google.maps.Marker({
        position: location,
        map: map,
        // draggable: true
    });

    /* Get coordinates while moving */
    google.maps.event.addListener(marker, 'dragend', function() {
        let latLng = marker.getPosition();
        let currentLatitude = latLng.lat();
        let currentLongitude = latLng.lng();
        console.log(currentLatitude);
        console.log(currentLongitude);
    });

    /* Glowin effect */
    const container = document.querySelector(".contact__us__inner");
    container.addEventListener('mousemove', e => {
        const rect = container.getBoundingClientRect();

        const x = e.clientX;
        const y = e.clientY;

        console.log(x, y);

        container.style.setProperty("--X", `${x}px`);
        container.style.setProperty("--y", `${y}px`);
    })
});
