<template id="loja-crud">
  <div>
    <v-menu v-if="user.nivel > 2 && user.grupo == 'P'" bottom left  @click="">
      <v-btn slot="activator" small color="blue darken-2" dark fab>
        <v-icon>mdi-information-variant</v-icon>
      </v-btn>
      <v-list>
        <v-list-tile @click="modalCat = true; selecItem(item)">
          <v-list-tile-title>
            <span class="mdi mdi-wrench"></span>Categoria
          </v-list-tile-title>
          </v-list-tile>
          <v-list-tile @click="modalEdt = true; selecItem(item)">
            <v-list-tile-title>
              <span class="mdi mdi-pencil"></span>Editar
            </v-list-tile-title>
          </v-list-tile>
          <v-list-tile v-if="user.nivel > 3" @click="modalDel = true; selecItem(item)">
            <v-list-tile-title>
              <span class="mdi mdi-delete"></span>Delete
            </v-list-tile-title>
          </v-list-tile>
        </v-list-tile>
      </v-list>
    </v-menu>
    <div>
      <loja-edt v-if="modalEdt" v-on:close="modalEdt = false" :dialog="modalEdt" :data="data"></loja-edt>
      <loja-del v-if="modalDel" v-on:close="modalDel = false" :dialog="modalDel" :data="data"></loja-del>
      <loja-cat v-if="modalCat" v-on:close="modalCat = false" :dialog="modalCat" :data="data"></loja-cat>
    </div>
  </div>
</template>

<?php require_once 'src/components/loja/_addLoja.php';?>
<?php require_once 'src/components/loja/_edtLoja.php';?>
<?php require_once 'src/components/loja/_delLoja.php';?>
<?php require_once 'src/components/loja/_catLoja.php';?>

<script>
Vue.component('loja-crud', {
  template: '#loja-crud',
  props: {
    data: Object
  },
  data: function () {
    return {
      fab: false,
      hover: false,
      modalEdt: false,
      modalDel: false,
      modalCat: false,
    }
  },
  computed: {
    user()  {
      return store.state.user;
    },
  },
  methods: {  
  }
});
</script>