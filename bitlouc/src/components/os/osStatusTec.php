
<template id="os-statustec">
  <div>
    <v-card>
      <v-card-title primary-title>
        <div>
          <div class="headline">OSs vs Tecnicos</div>
          <span class="grey--text">Quantidade abertas: {{ ossAbertas }}</span>
        </div>
      </v-card-title>
      <bar-chart :data="osStatusTec" :colors="['#2196f3 ', '#666']" label="OSs" xtitle="OS" ytitle="Tecnico(s)"></bar-chart>
    </v-card>
  </div>
</template>
<script>
Vue.component('os-statustec', {
  name: 'os-statustec',
  template: '#os-statustec',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      status: null,
      ossAbertas: null,
    };
  },
  created: function() {
    //this.$store.dispatch('fetchLocais', this.$route.params._loja).then(() => {
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
      this.ossAbertas = oss.length;
      var tecnicos  = store.state.tecnicos;
      var value = [];
      for (var user of tecnicos) {
        var count = 0;
        var postData = [];
        for (var os of oss) {
          for (var tec of os.tecnicos) {  
            if(user.id == tec.tecnico_id) {
              count++;
            }
          }
        }
        postData.push(user.user_nick)
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