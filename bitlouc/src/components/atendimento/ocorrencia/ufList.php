
<template id="uf-list">
  <div>
    <v-container>
      <v-layout>
      <os-grid :data="oss" :status="status"></os-grid>
      </v-layout>
    </v-container>
  </div>      
</template>
<script>
var UFList = Vue.extend({
    template: '#uf-list',
    data: function () {
        return {
            errorMessage: '',
            successMessage: '',
            status: null,
            active: '0',
            gridColumns: ['displayName', 'name']
        };
    },
    created() {
    },
    computed: {
      oss()  {
        return store.getters.getOssUF(this.$route.params._uf);
      },
      osStatusTec() {
        /*function Comparator(a, b) {
          if (a[1] > b[1]) return -1;
          if (a[1] < b[1]) return 1;
          return 0;
        }
        
        var oss = store.getters.getOsId(this.$route.params._os);
        
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
          postData.push(user.userNick)
          postData.push(count)
          if(count > 0){
            value.push( postData)
          }
        }
        value = value.sort(Comparator);
        return value;*/
      },
    },
    methods: {
    }
});
</script>
