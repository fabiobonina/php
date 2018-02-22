<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Vuetify</title>
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet" type="text/css">
    <!--link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet" type="text/css"></link>
    <link href="styles.css" rel="stylesheet" type="text/css"-->
  </head>
  <body>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.3/vue.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAU4CVf8FLD6nXeKM_lSBL_nnY8DobX6Qs"></script>

  <div id="app">
  <vue-map :markers="locations"></vue-map>
</div>

<script type="text/x-template" id="map">
  <div class="map">
  </div>
</script>
  <script>
    Vue.component('vue-map', {
  template: '#map',
  props: {
    markers: {
      type: Array,
      default: []
    },
    option: {
      type: Object,
      default: {
        zoom: 16,
        center: {lat: -34.397, lng: 150.644},
      }
    }
  },
  data: function() {
    return {
      map: {}
    }
  },
  mounted: function() {
    let el = this.$el;
    let bounds = new google.maps.LatLngBounds();
    
    this.map = new google.maps.Map(el, this.option);
    
    for (let i = 0; i < this.markers.length; i++) {
      let position = new google.maps.LatLng(this.markers[i].lat, this.markers[i].lng);
      bounds.extend(position);
      this.setMarker(this.markers[i]);
    }
    
    this.map.fitBounds(bounds);
  },
  methods: {
    // set marker
    // @param {Object} pos
    setMarker(pos) {
      let latlng = new google.maps.LatLng(pos.lat, pos.lng);
      let marker = new google.maps.Marker({
        position: latlng,
        map: this.map,
        title: pos.title
      })
      let infoWindow = new google.maps.InfoWindow();
      infoWindow.setContent('<div class="map__info">' + pos.description + '</div>');
      
      // Setup event for marker
      google.maps.event.addListener(marker, 'mouseover', () => {
        infoWindow.open(this.map, marker);
      });
      
      google.maps.event.addListener(marker, 'mouseout', () => {
        infoWindow.close(this.map, marker);
      });
      
      google.maps.event.addListener(marker, 'click', () => {
        console.log("abc");
      });
    }
  }
})

let vm = new Vue({
  el: '#app',
  data: {
    locations: [{
      title: 'Location A',
      lat: 15.9182808,
      lng: 108.3470323,
      description: 'this is Location A',
    }, {
      title: 'Location B',
      lat: 16.0471659,
      lng: 108.1716864,
      description: 'this is Location B',
    }, {
      title: 'Location C',
      lat: 20.8467333,
      lng: 106.6637271,
      description: 'this is Location C',
    }, {
      title: 'Location D',
      lat: 10.823099,
      lng: 106.629664,
      description: 'this is Location D',
    }]
  }
});

  </script>

</body>
</html>
