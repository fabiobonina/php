<!DOCTYPE html>
<html>
<head>
  <title>Vuetify Blog Starter</title>
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
  <link href="https://unpkg.com/vuetify@1.1.0-alpha.1/dist/vuetify.css" rel="stylesheet">
  
</head>
<body>
<div id="app">
  <line-chart :data="chartData"></line-chart>
  <p>{{ $data}}</p>
</div>
 <script src="https://unpkg.com/vue/dist/vue.js"></script>
 <script src="https://unpkg.com/vuetify@1.1.0-alpha.1/dist/vuetify.js"></script>
  <script src="https://unpkg.com/chart.js@2.7.2/dist/Chart.bundle.js"></script>
  <script src="https://unpkg.com/vue-chartkick@0.5.0"></script>
 <script>
  var app = new Vue({
    el: "#app",
    data: {
      chartData: [["Jan", 4], ["Feb", 2], ["Mar", 10], ["Apr", 5], ["May", 3]]
    }
  })
</script>
</body>
</html>
