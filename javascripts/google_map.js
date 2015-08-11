    var MAP_ID = 'custom_style';

    function initialize() {
      var featureOpts = [
        {
          "featureType": "landscape",
          "stylers": [
            { "saturation": -100 },
            {	"lightness": 65	},
            {	"visibility": "on" }
          ]
        },
        {
          "featureType": "poi",
          "stylers": [
            {	"saturation": -100	},
            {	"lightness": 51	},
            {	"visibility": "simplified"	}
          ]
        },
        {
          "featureType": "road.highway",
          "stylers": [
            {	"saturation": -100	},
            {	"visibility": "simplified" }
          ]
        },
        {
          "featureType": "road.arterial",
          "stylers": [
            { "saturation": -100	},
            { "lightness": 30 },
            { "visibility": "on" }
          ]
        },
        {
          "featureType": "road.local",
          "stylers": [
            { "saturation": -100 },
            {	"lightness": 40 },
            {	"visibility": "on" }
          ]
        },
        {
          "featureType": "transit",
          "stylers": [
            { "saturation": -100 },
            { "visibility": "simplified" }
          ]
        },
        {
          "featureType": "administrative.province",
          "stylers": [
            {	"visibility": "off" }
          ]
        },
        {
          "featureType": "water",
          "elementType": "labels",
          "stylers": [
            { "visibility": "on" },
            { "lightness": -25 },
            { "saturation": -100 }
          ]
        },
        {
          "featureType": "water",
          "elementType": "geometry",
          "stylers": [
            { "hue": "#ffff00" },
            { "lightness": -25 },
            { "saturation": -97 }
          ]
        }
      ];

      var mapOptions = {
        center: { lat: 51.927630, lng: 4.478093},
        zoom: 13,
        mapTypeId: MAP_ID
      };

      var map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);

      var styledMapOptions = {
        name: 'Custom Style'
      };

      var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

      map.mapTypes.set(MAP_ID, customMapType);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
