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
  <GChart type="ColumnChart" :data="chartData" :options="chartOptions"></GChart>
  <!--line-chart :data="chartData"></line-chart-->
  <p>{{ $data}}</p>
</div>
 <script src="https://unpkg.com/vue/dist/vue.js"></script>
 <script src="https://unpkg.com/vuetify@1.1.0-alpha.1/dist/vuetify.js"></script>
 
<script src="vue-google-charts.browser.js"></script>
 <script>
  Vue.use(VueGoogleCharts);
  var app = new Vue({
    el: "#app",
    data: {
      //chartData: [["Jan", 4], ["Feb", 2], ["Mar", 10], ["Apr", 5], ["May", 3]],
      chartData: [
        ['Year', 'Sales', 'Expenses', 'Profit'],
        ['2014', 1000, 400, 200],
        ['2015', 1170, 460, 250],
        ['2016', 660, 1120, 300],
        ['2017', 1030, 540, 350]
      ],
      chartOptions: {
        chart: {
          title: 'Company Performance',
          subtitle: 'Sales, Expenses, and Profit: 2014-2017',
        }
      }
    }
  })
</script>
</body>
</html>
