var THEMEMASCOT_googlemap_init_obj = {};
var THEMEMASCOT_GEOCODE_ERROR = "Error";

function googlemap_init(dom_obj, coords) {
    "use strict";
    try {
        var latlng;
        if (coords.latlng!=='') {
            var latlngStr = coords.latlng.split(',');
            var lat = latlngStr[0];//parseFloat(latlngStr[0]);
            var lng = latlngStr[1];//parseFloat(latlngStr[1]);
            latlng = new google.maps.LatLng(lat, lng);
        } else {
            latlng = new google.maps.LatLng(0, 0);
        }
        var id = dom_obj.id;
        THEMEMASCOT_googlemap_init_obj[id] = {};
        THEMEMASCOT_googlemap_init_obj[id].dom = dom_obj;
        THEMEMASCOT_googlemap_init_obj[id].point = coords.point;
        THEMEMASCOT_googlemap_init_obj[id].description = coords.description;
        THEMEMASCOT_googlemap_init_obj[id].title = coords.title;
        THEMEMASCOT_googlemap_init_obj[id].opt = {
            zoom: coords.zoom,
            center: latlng,
            scrollwheel: false,
            scaleControl: false,
            disableDefaultUI: false,
            panControl: true,
            zoomControl: true, //zoom
            mapTypeControl: false,
            streetViewControl: false,
            overviewMapControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var custom_map = new google.maps.Geocoder();
        custom_map.geocode(coords.latlng!=='' ? {'latLng': latlng} : {"address": coords.address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                THEMEMASCOT_googlemap_init_obj[id].address = results[0].geometry.location;
                googlemap_create(id);
            } else {
                alert(THEMEMASCOT_GEOCODE_ERROR + ' ' + status);
            }
        });

        jQuery(window).resize(function() {
            if (THEMEMASCOT_googlemap_init_obj[id].map) {
                THEMEMASCOT_googlemap_init_obj[id].map.setCenter(THEMEMASCOT_googlemap_init_obj[id].address);
            }
        });

    } catch (e) {
        //alert('not found');
    }
}

function googlemap_create(id) {
    "use strict";
    if (!THEMEMASCOT_googlemap_init_obj[id].address) { 
        return false;
    }
    THEMEMASCOT_googlemap_init_obj[id].map = new google.maps.Map(THEMEMASCOT_googlemap_init_obj[id].dom, THEMEMASCOT_googlemap_init_obj[id].opt);
    THEMEMASCOT_googlemap_init_obj[id].map.setCenter(THEMEMASCOT_googlemap_init_obj[id].address);
    var markerInit = {
        map: THEMEMASCOT_googlemap_init_obj[id].map,
        position: THEMEMASCOT_googlemap_init_obj[id].address   //THEMEMASCOT_googlemap_init_obj[id].map.getCenter()
    };
    if (THEMEMASCOT_googlemap_init_obj[id].point) { 
        markerInit.icon = THEMEMASCOT_googlemap_init_obj[id].point;
    }
    if (THEMEMASCOT_googlemap_init_obj[id].title) { 
        markerInit.title = THEMEMASCOT_googlemap_init_obj[id].title;
    }
    var marker = new google.maps.Marker(markerInit);
    var infowindow = new google.maps.InfoWindow({
        content: THEMEMASCOT_googlemap_init_obj[id].description
    });
    google.maps.event.addListener(marker, "click", function() {
        infowindow.open(THEMEMASCOT_googlemap_init_obj[id].map, marker);
    });
}


function googlemap_refresh(){
    for(id in THEMEMASCOT_googlemap_init_obj){
        googlemap_create(id);
    }
}


jQuery(document).ready(function() {
    jQuery('.map-canvas').each(function() {
        var current_item = jQuery(this);
        var map_address = current_item.data('address');
        var map_latlng = current_item.data('latlng');
        var map_zoom = current_item.data('zoom');
        var map_style = current_item.data('mapstyle');
        var map_title = current_item.data('title');
        var map_descr = jQuery(current_item.data("popupstring-id")).html();
        var map_point = current_item.data('marker');
        googlemap_init(current_item.get(0), {
            address: map_address,
            latlng: map_latlng,
            zoom: map_zoom,
            style: map_style,
            title: map_title,
            description: map_descr,
            point: map_point
        });
    });
});