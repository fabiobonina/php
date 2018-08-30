<template id="lojas">
  <div>

    <top></top>
    <v-content>
      <v-container fluid>
        <list-lojas :data="lojas"></list-lojas>
        
        <grid-lojas :data="lojas"></grid-lojas>
      </v-container>
    </v-content>
    <rodape></rodape>

  </div>
</template>

<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>
<?php require_once 'src/components/loja/lojas-grid.php';?>
<?php require_once 'src/components/loja/lojas-list.php';?>

<script>
  var Lojas = Vue.extend({
    template: '#lojas',
    data: function () {
      return {
        search: '',
        headers: [
          { text: 'Dessert (100g serving)', align: 'left', sortable: false, value: 'name' },
          { text: 'Calories', value: 'calories' },
          { text: 'Fat (g)', value: 'fat' },
          { text: 'Carbs (g)', value: 'carbs' },
          { text: 'Protein (g)', value: 'protein' },
          { text: 'Iron (%)', value: 'iron' }
        ],
        desserts: [
          { value: false, name: 'Frozen Yogurt', calories: 159, fat: 6.0, carbs: 24, protein: 4.0, iron: '1%'},
        ],
        errorMessage: '',
        successMessage: '',
        active: '0',
        gridColumns: ['displayName', 'name'],
        search:'',
        modalLojaAdd: false
      };
    },
    created() {
    },
    computed: {
      user()  {
        return store.state.user;
      },
      proprietario() {
        return store.state.proprietario;
      },
      osProprietario() {
        return store.state.osProprietario;
      },
      lojas() {
        return store.getters.getLojaAtivo();
        //return store.state.lojas;
      },
    },
    methods: {
      onAtualizar: function(){
        this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
          console.log("Buscando dados das locais!")
        });
      }
    }
  });

</script>



