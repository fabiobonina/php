
<template id="uf-list">
  <div v-if="_uf">
    <v-card flat tile color="grey lighten-2">
      <v-toolbar color="cyan" prominent class="white--text" height="80px">
        <v-btn @click="$router.go(-1)" icon >
          <v-icon class="white--text">arrow_back</v-icon>
        </v-btn>
        <div>
        <div class="title">{{ _uf.name }}</div>
        
          <div class="white--text">
          <v-btn-toggle v-if="user.nivel > 1 && user.grupo == 'P'"  v-model="status">
            <v-btn flat  v-for="n in itens" v-on:click="status = n.ativo " :value="n.ativo" :key="n.id">
              <v-icon>{{ n.icon }}</v-icon>
              <span>{{ n.name }}</span>
            </v-btn>
          </v-btn-toggle>
          </div>
        </div>
        <v-spacer></v-spacer>
      </v-toolbar>
    </v-card>
        
      <atend-grid :data="oss" :status="status" v-on:atualizar="atualizar()"></atend-grid>
  </div>      
</template>
<script>
var UFList = Vue.extend({
    template: '#uf-list',
    data: function () {
        return {
            errorMessage: '',
            successMessage: '',
            itens: [
              { id:1, name: 'Pendente', ativo: '0', icon: 'mdi-exclamation' },
              { id:2, name: 'Andamento', ativo: '1', icon: 'mdi-loading mdi-spin' },
              { id:3, name: 'Encerradas', ativo: '2', icon: 'mdi-check' },
              { id:4, name: 'Ajustar', ativo: '3', icon: 'mdi-alert-outline' },
            ],
            active: '0',
            gridColumns: ['displayName', 'name']
        };
    },
    created() {
    },
    computed: {
      user()  {
        return store.state.user;
      },
      _uf()  {
        return store.getters.getUF(this.$route.params._uf);
      },
      oss()  {
        return store.getters.getOssUF(this.$route.params._uf);
      },
      status: {
      // getter
        get: function () {
          return store.state.status;
        },
        // setter
        set: function (newValue) {
          var name = newValue
          this.$store.dispatch("setStatus", name );
        }
      }
    },
    methods: {
      setStatus(item){
        var name = item;
        this.$store.dispatch("setStatus", name );
      },
      atualizar: function(){
        this.$store.dispatch("fetchIndex").then(() => {
          console.log("Buscando dados para inicial!")
        });
      },
    }
});
</script>
