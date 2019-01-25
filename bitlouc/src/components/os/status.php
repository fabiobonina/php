
<template id="os-status">
  <div>
    <v-container fluid class="pa-0">
      <v-layout row wrap>
        <v-btn-toggle v-if="user.nivel > 1 && user.grupo == 'P'"  v-model="status">
          <v-btn flat  v-for="n in itens" v-on:click="status = n.ativo " :value="n.ativo" :key="n.id">
            <v-icon>{{ n.icon }}</v-icon>
            <span>{{ n.name }}</span>
          </v-btn>
          <v-btn v-if="user.nivel > 1 && user.grupo == 'P'" flat v-on:click="status = '3'" value="3">
            <v-icon>done</v-icon>
            <span>Ajustar</span>
          </v-btn>
        </v-btn-toggle>
      </v-layout>
    </v-container>
    <section>
      <div>
        <atend-grid :data="oss" :status="status"></atend-grid>
      </div>
    </section>
  </div>
</template>
<script>
var OsStus = Vue.extend({
  template: '#os-status',
  name: 'os-status',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      itens: [
        { id:1, name: 'Pedente', ativo: '0', icon: 'mdi-exclamation' },
        { id:2, name: 'Andamento', ativo: '1', icon: 'mdi-loading mdi-spin' },
        { id:3, name: 'Encerradas', ativo: '2', icon: 'mdi-check' },
      ],
    };
  },
  created: function() {
    //this.$store.dispatch('setStatus', this.ativo);
  },
  mounted: function() {
    //this.modalLocalAdd = true;
  },
  computed: {
    user()  {
      return store.state.user;
    },
    oss()  {
      return store.state.oss;
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
  }, // computed
  methods: {
    setStatus(item){
      var name = item;
      this.$store.dispatch("setStatus", name );
    }
  },
});
</script>