    //<![CDATA[

    var customIcons = {
      Criminalidade: {
        icon: 'http://www.google.com/mapfiles/dd-start.png',
        shadow: 'http://www.google.com/mapfiles/dd-start.png'
      },
      Doenca: {
        icon: 'http://www.google.com/mapfiles/marker.png',
        shadow: 'http://www.google.com/mapfiles/marker.png'
      }
    };

    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(-8.0631633,-34.8733278,17),
        zoom: 10,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("maps_xml.php", function(data) {
        var xml = data.responseXML;
        var localidade = xml.documentElement.getElementsByTagName("tb_localidades");
        for (var i = 0; i < localidade.length; i++) {
          var name = localidade[i].getAttribute("name");
          var address = localidade[i].getAttribute("address");
          var type = localidade[i].getAttribute("type");
          var descricao = localidade[i].getAttribute("descricao");
          var point = new google.maps.LatLng(
              parseFloat(localidade[i].getAttribute("lat")),
              parseFloat(localidade[i].getAttribute("lng")));
          var html = "<b>" + name + "</b> <br/>" + address + "</b> <br/>" + type+ "</b>: " + descricao;
          var icon = customIcons[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon,
            shadow: icon.shadow
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    //]]>

