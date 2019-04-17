<template id="programacao-index">
<v-content>
  <div>
    <v-container fluid class="pa-0">
      <v-layout row wrap>
        <v-btn-toggle v-if="user.nivel > 1 && user.grupo == 'P'"  v-model="active">
          <v-btn flat  v-for="n in itens" v-on:click="active = n.ativo " :value="n.ativo" :key="n.id">
            <v-icon>{{ n.icon }}</v-icon>
            <span>{{ n.name }}</span>
          </v-btn>
        </v-btn-toggle>
      </v-layout>
    </v-container>
    <section>
      <programacao :data="cilProgramacoes" :local="local" :status="active"></programacao>
      <bem-add v-if="modalAdd" v-on:close="modalAdd = false" ></bem-add>
    </section>
  </div>

  <rodape></rodape>
  </v-content>
</template>

<?php require_once 'src/components/controle_cilindros/programacao/_list.php';?>

<script>
  var ProgramacaoIndex = Vue.extend({
    name: 'programacao-index',
    template: '#programacao-index',
    props: {
      proprietario: String,
      nivel: String,
      grupo: String
    },
    data: function () {
      return {
        errorMessage: '',
        successMessage: '',
        search: '',
        modalAdd: false,
        modalOs: false,
        active: '1',
        modalItem: null,
        itens: [
          { id:1, name: 'Operação', ativo: '1', icon: 'done' },
          { id:2, name: 'Instalação', ativo: '0', icon: 'done' },
          { id:3, name: 'Ocioso', ativo: '2', icon: 'done' },
        ],
        
      };
    },
    created: function() {
      this.$store.dispatch("fetchCilProgramacao").then(() => {
        console.log("Buscando Programacao de cilindros!")
      });
    },
    computed: {
      user()  {
        return store.state.user;
      },
      cilProgramacoes()  {
        //return store.getters.getEquipamentoLocal(this.$route.params._local);
        return store.state.cilProgramacoes;
      },
      local()  {
        return store.state.local;
      },
    },
    methods: {
      
      // Bu metot http post ile formdan alınan verileri apiye iletir
      // Apiden dönen cevap users dizisine push edilir
    }
  });
</script>
<script src="src/mixins/cilindros.js"></script>
