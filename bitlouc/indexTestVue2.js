/**
 * Vue.js with PHP Api
 * @author Fabio Bonina <fabio.bonina@gmail.com>
*/
//Todos os postdados são enviados como json
//True para enviar como dados do formulário
//Vue.http.options.emulateJSON = true;
var demo = new Vue({
  el: "#vue-map",
  data: {
    options: {
      zoom: 3,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      center: new google.maps.LatLng(-31.563910, 140.19179)
    },
    map: "",
    zoomTreshold: 4,
    radiusTreshold: 400000, // in meters
    locations: [
      { lat: -31.563910, lng: 147.154312 },
      { lat: -33.718234, lng: 150.363181 },
      { lat: -33.727111, lng: 150.371124 },
      { lat: -33.848588, lng: 151.209834 },
      { lat: -33.851702, lng: 151.216968 },
      { lat: -34.671264, lng: 150.863657 },
      { lat: -35.304724, lng: 148.662905, boutique: true },
      { lat: -36.817685, lng: 175.699196 },
      { lat: -36.828611, lng: 175.790222 },
      { lat: -37.750000, lng: 145.116667 },
      { lat: -37.759859, lng: 145.128708 },
      { lat: -37.765015, lng: 145.133858 },
      { lat: -37.770104, lng: 145.143299 },
      { lat: -37.773700, lng: 145.145187 },
      { lat: -37.774785, lng: 145.137978 },
      { lat: -37.819616, lng: 144.968119 },
      { lat: -38.330766, lng: 144.695692 },
      { lat: -39.927193, lng: 175.053218 },
      { lat: -41.330162, lng: 174.865694 },
      { lat: -42.734358, lng: 147.439506 },
      { lat: -42.734358, lng: 147.501315 },
      { lat: -42.735258, lng: 147.438000 },
      { lat: -43.999792, lng: 170.463352, boutique: true }
    ],
    visibleMarkers: [],
    noVisibleMarkers: false,
    markers: [],
    uluru: [{ lat: -25.363, lng: 131.044 }],
    infoWindow: "",
    currentZoom: 0,
    currentLocation: ""
  },
  watch: {
    locations: function(val) {
      this.deleteMarkers();
      this.createMarkers();
    }
  },
  methods: {
    addUluru: function() {
      for (var i = 0; i < this.uluru.length; i++) {
        this.locations.push(this.uluru[i]);
      }
    },
    createMarkers: function() {
      var self = this;
      this.markers = this.locations.map(function(location, i) {
        var infoWindowContent =
          "<h2> Marker n. " +
          i +
          "</h2>" +
          "<br />" +
          "<p>lat: " +
          location.lat +
          "<br />lng: " +
          location.lng +
          "</p>";
        var marker = new google.maps.Marker({
          position: location,
          name: "Marker n. " + i,
          boutique: location.boutique,
          info: infoWindowContent,
          id: i + 1
        });
        google.maps.event.addListener(marker, "click", function() {
          self.infoWindow.setContent(this.info);
          self.infoWindow.open(self.map, this);
        });
        return marker;
      });
      new MarkerClusterer(this.map, this.markers, {
        imagePath: "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m"
      });
    },
    deleteMarkers() {
      for (var i = 0; i < this.markers.length; i++) {
        this.markers[i].setMap(null);
      }
      this.markers = [];
    },
    getVisibleMarkers: function() {
      var self = this;
      google.maps.event.addListener(self.map, "idle", function() {
        self.noVisibleMarkers = false;
        
        // Read the bounds of the map being displayed.
        bounds = self.map.getBounds();

        // delete previously added items
        self.visibleMarkers = [];

        // Iterate through all of the markers that are displayed on the *entire* map.
        for (var i = 0; i < self.markers.length; i++) {
          currentMarker = self.markers[i];

          /* If the current marker is visible within the bounds of the current map,
           * let's add it as a list item to #nearby-results that's located above
           * this script.
           */
          if (bounds.contains(currentMarker.getPosition())) {
            /* Only add a list item if it doesn't already exist. This is so that				  				 
             * if the browser is resized or the tablet or phone is rotated, we don't
             * have multiple results.
             */

            self.visibleMarkers.push(currentMarker);
          }
        }
        
        if (self.visibleMarkers.length) {
          self.moveBoutiquesToTop();
        } else {
          self.noVisibleMarkers = true;
          self.getInvisibleMarkersInTresholdRadius();
          self.moveBoutiquesToTop();
        }
      });
      
      console.log(this.noVisibleMarkers);
    },
    getInvisibleMarkersInTresholdRadius: function() {
      // TODO: maybe find a less expensive way?
      var center = this.currentLocation.position ? this.currentLocation.position : this.map.center;
      for (var i = 0; i < this.markers.length; i++) { 
        var distance = google.maps.geometry.spherical.computeDistanceBetween(
          center,
          this.markers[i].position
        );
        if (distance < this.radiusTreshold) {
          this.visibleMarkers.push(this.markers[i]);
        }
      }
    },
    moveBoutiquesToTop: function() {
      var center = this.currentLocation.position ? this.currentLocation.position : this.map.center;
      for (var i = 0; i < this.visibleMarkers.length; i++) {
        var distance = google.maps.geometry.spherical.computeDistanceBetween(
          center,
          this.visibleMarkers[i].position
        );
        this.visibleMarkers[i].distanceFromCenter = distance;
        // if closer than 400 km AND is a boutique
        if (distance < this.radiusTreshold && this.visibleMarkers[i].boutique) {
          // move marker to the start of the array
          var a = this.visibleMarkers.splice(i, 1);
          this.visibleMarkers.unshift(a[0]);
        }
      }
    },
    initAutocomplete: function() {
      var self = this;
      var autocompleteInput = document.getElementById("autocompleteInput");
      var autocomplete = new google.maps.places.Autocomplete(autocompleteInput);
      autocomplete.addListener("place_changed", function() {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
          // User entered the name of a Place that was not suggested and
          // pressed the Enter key, or the Place Details request failed.
          window.alert("No details available for input: '" + place.name + "'");
          return;
        } else {
          if (self.currentLocation) {
            self.currentLocation.setMap(null);
          }                 
          self.currentLocation = new google.maps.Marker({
            position: place.geometry.location,
            id: "currentLocation",
            icon: "https://mt.googleapis.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=0288D1&scale=2.0",
            map: self.map
          });
        }
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
          self.map.fitBounds(place.geometry.viewport);
        } else {
          self.map.setCenter(place.geometry.location);
          self.map.setZoom(17); // Why 17? Because it looks good.
        }
      });
    },
    getCurrentZoom: function() {
      var self = this;
      google.maps.event.addListener(self.map, "idle", function() {
        self.currentZoom = self.map.zoom;
      });
    },
    centerMapToMarker: function(e) {
      var id = e.target.dataset.id;
      for (var i = 0; i < this.visibleMarkers.length; i++) {
        if (this.visibleMarkers[i].id == id) {
          var thisMarker = this.visibleMarkers[i];
          // open info window above marker
          // this.infoWindow.setContent(thisMarker.info);
          // this.infoWindow.open(this.map, thisMarker);
          // pan map to the marker

          this.map.panTo(thisMarker.getPosition());
          this.map.setZoom(17);

          return false;
        }
      }
    }
  },
  mounted: function() {
    this.map = new google.maps.Map(
      document.getElementById("map_canvas2"),
      this.options
    );
    this.createMarkers();
    this.getVisibleMarkers();
    this.infoWindow = new google.maps.InfoWindow({ content: "" });
    this.initAutocomplete();
    this.getCurrentZoom();
  }
});