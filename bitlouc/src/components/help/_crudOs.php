<template id="os-crud">
  <div>
    <v-menu v-if="user.nivel > 2 && user.grupo == 'P'" bottom left  @click="">
      <v-btn slot="activator" small color="blue darken-2" dark fab>
        <v-icon>mdi-information-variant</v-icon>
      </v-btn>
      <v-list>
        <v-list-tile @click="modalOs = true; selecItem(item)">
          <v-list-tile-title>
            <span class="mdi mdi-wrench"></span>Amarrar OS
          </v-list-tile-title>
        </v-list-tile>
        <v-list-tile @click="modalTec = true; selecItem(item)">
          <v-list-tile-title>
            <span class="mdi mdi-worker"></span>Tecnicos
          </v-list-tile-title>
        </v-list-tile>
        <v-list-tile @click="modalEdt = true; selecItem(item)">
          <v-list-tile-title>
            <span class="mdi mdi-pencil"></span>Editar
          </v-list-tile-title>
        </v-list-tile>
        <v-list-tile v-if="item.status == '0' && item.processo == '0' || user.nivel > 3" @click="modalDel = true; selecItem(item)">
          <v-list-tile-title>
            <span class="mdi mdi-delete"></span>Delete
          </v-list-tile-title>
        </v-list-tile>
      </v-list>
    </v-menu>
    <div>
      <os-tec v-if="modalTec" v-on:close="modalTec = false" :dialog="modalTec" data="modalItem" :data="modalItem"></os-tec>
      <os-edt v-if="modalEdt" v-on:close="modalEdt = false" :dialog="modalEdt" :data="modalItem"></os-edt>
      <os-del v-if="modalDel" v-on:close="modalDel = false" :dialog="modalDel" :data="modalItem"></os-del>
      <os-amarrac v-if="modalOs" v-on:close="modalOs = false" :dialog="modalOs" :data="modalItem"></os-amarrac>
    </div>
  </div>
</template>

<?php require_once 'src/components/os/_edtOs.php';?>
<?php require_once 'src/components/os/_delOs.php';?>
<?php require_once 'src/components/os/_tecOs.php';?> 
<?php require_once 'src/components/os/_amarracOs.php';?>

<script>
Vue.component('os-crud', {
  template: '#os-crud',
  props: {
    data: Object
  },
  data: function () {
    return {
      modalTec: false,
      modalEdt: false,
      modalDel: false,
      modalOs: false,
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

