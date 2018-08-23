Vue.component('vue-map', {
  name: 'vue-map',
  template: '#vue-map',
  data: function () {
    var sortOrders = {}
    return {
      options: {
        zoom: 3,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: new google.maps.LatLng( -14.239104, -51.925403 )
      },
      map: "",
      zoomTreshold: 4,
      radiusTreshold: 400000, // in meters
      visibleMarkers: [],
      noVisibleMarkers: false,
      markers: [],
      uluru: [{ lat: -25.363, lng: 131.044 }],
      infoWindow: "",
      currentZoom: 0,
      currentLocation: "",
      search: '',
      sortKey:''
    };
  },
  watch: {
    filteredData: function(val) {
      this.deleteMarkers();
      this.createMarkers();
      //this.getVisibleMarkers();
      //this.getInvisibleMarkersInTresholdRadius();
      //this.centerMapToMarker();
      //this.moveBoutiquesToTop();
      //this.getCurrentZoom();
      //this.initAutocomplete();
      this.visibleMarkers;
      this.currentZoom;
    }
  },
  computed: {
    locais()  {
      return store.state.locais;
    },
    filteredData: function () {
      var filterKey = this.search && this.search.toLowerCase()
      var data = store.state.locais
      if (filterKey) {
        data = data.filter(function (row) {
          return Object.keys(row).some(function (key) {
            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
          })
        })
      }
      return data
    }
  },
  filters: {
    capitalize: function (str) {
      return str.charAt(0).toUpperCase() + str.slice(1)
    }
  },
  methods: {
    addUluru: function() {
      for (var i = 0; i < this.uluru.length; i++) {
        this.filteredData.push(this.uluru[i]);
      }
    },
    createMarkers: function() {
      var self = this;
      this.markers = this.filteredData.map(function(location, i) {
        var latitude = parseFloat(location.latitude).toFixed(6)
        var longitude = parseFloat(location.longitude).toFixed(6)
        var position = {
          lat: Number( latitude ), 
          lng: Number( longitude)
        }
        //console.log(position)
        var infoWindowContent =
          "<h2> Loja n. " + location.id + "</h2>" + "<br />" + 
          "<p>" + location.lojaNick + "</p>"+ "<br />" + 
          "<p>" + location.tipo +" - " + location.name +
          "<br /> " + location.municipio +" /" + location.uf + "</p>";
        var marker = new google.maps.Marker({
          position: position,
          name: location.tipo +" - " + location.name ,
          loja: location.lojaNick,
          local: location.municipio +" /" + location.uf,
          info: infoWindowContent,
          id: location.id
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
          // Se o marcador atual estiver visível dentro dos limites do mapa atual,
          // Vamos adicioná-lo como um item de lista para # próximos-resultados que está localizado acima
          // este script.           
          if (bounds.contains(currentMarker.getPosition())) {
            // Apenas adicione um item da lista se ainda não existir. Isto é para que
            // se o navegador for redimensionado ou o tablet ou o telefone girado, não o fazemos
            // tem múltiplos resultados.
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
      // TODO: talvez encontre uma maneira menos dispendiosa?
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
        // Se estiver perto de 400 km e é uma boutique
        if (distance < this.radiusTreshold && this.visibleMarkers[i].boutique) {
          // Mova o marcador para o início da matriz
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
          /* O usuário inseriu o nome de um lugar que não foi sugerido e
          pressionou a tecla Enter ou a solicitação Detalhes do local falhou.*/
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
        // Se o lugar tiver uma geometria, então apresente-a em um mapa.
        if (place.geometry.viewport) {
          self.map.fitBounds(place.geometry.viewport);
        } else {
          self.map.setCenter(place.geometry.location);
          self.map.setZoom(17); // Por que 17? Porque parece bom.
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
    },
    sortBy: function (key) {
      this.sortKey = key
      this.sortOrders[key] = this.sortOrders[key] * -1
    },
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