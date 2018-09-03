
<template id="os-statustec">
  <div>
    <section class="container">
      <div>
        <bar-chart :data="osStatusTec" :colors="['#2196f3 ', '#666']"></bar-chart>
      </div>
    </section>
  </div>
</template>
<script>
Vue.component('os-statusec', {
  name: 'os-statusec',
  template: '#os-statustec',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      status: null,
    };
  },
  created: function() {
    //this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
      //console.log("Buscando dados das locais!")
    //});
  },
  mounted: function() {
    //this.modalLocalAdd = true;
  },
  computed: {
    user()  {
      return store.state.user;
    },
    osStatusTec()  {
      function Comparator(a, b) {
        if (a[1] > b[1]) return -1;
        if (a[1] < b[1]) return 1;
        return 0;
      }
      var oss   = store.state.oss;
      oss = oss.filter(function (row) {
        return Number(row.status) <= 1;
      });
      var tecnicos  = store.state.tecnicos;
      var value = [];
      for (var user of tecnicos) {
        var count = 0;
        var postData = [];
        for (var entry of oss) {
          for (var tec of entry.tecnicos) {  
            if(user.id == tec.tecnico) {
              count++;
            }
          }
        }
        postData.push(user.userNick)
        postData.push(count)
        if(count > 0){
          value.push( postData)
        }
      }
      value = value.sort(Comparator);
      return value;
    },
  },
  methods: {


  },
});
</script>