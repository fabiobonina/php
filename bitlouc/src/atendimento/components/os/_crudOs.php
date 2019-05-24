<template id="os-crud">
  <div>
    <div>
    <local-rota :lat="data.local_lat" :long="data.local_long"></local-rota>
    <v-menu v-if="user.nivel > 1 && user.grupo == 'P'" bottom left  @click="">
      <v-btn slot="activator" small color="blue darken-2" dark fab>
        <v-icon>mdi-information-variant</v-icon>
      </v-btn>
      <v-list>
        <v-list-tile @click="modalTec = true">
          <v-list-tile-title>
            <span class="mdi mdi-worker"></span>Tecnicos
          </v-list-tile-title>
        </v-list-tile>
        <v-list-tile v-if="user.nivel > 2 && user.grupo == 'P'" @click="modalOs = true">
          <v-list-tile-title>
            <span class="mdi mdi-wrench"></span>Amarrar OS
          </v-list-tile-title>
        </v-list-tile>
        <v-list-tile v-if="user.nivel > 2 && user.grupo == 'P'" @click="modalEdt = true">
          <v-list-tile-title>
            <span class="mdi mdi-pencil"></span>Editar
          </v-list-tile-title>
        </v-list-tile>
        <v-list-tile v-if="data.status == '0' || user.nivel > 3" @click="modalDel = true">
          <v-list-tile-title>
            <span class="mdi mdi-delete"></span>Delete
          </v-list-tile-title>
        </v-list-tile>
        <v-list-tile v-if="user.nivel > 2 && user.grupo == 'P'" @click="modalGeo = true">
          <v-list-tile-title>
            <v-icon>mdi-map-marker-plus</v-icon>Geolocalização
          </v-list-tile-title>
        </v-list-tile>
      </v-list>
    </v-menu>
    <div>
      <os-tec     v-if="modalTec" v-on:close="close()" v-on:atualizar="atualizar()" :dialog="modalTec" :data="data"></os-tec>
      <os-edt     v-if="modalEdt" v-on:close="close()" v-on:atualizar="atualizar()" :dialog="modalEdt" :data="data"></os-edt>
      <os-del     v-if="modalDel" v-on:close="close()" v-on:atualizar="atualizar()" :dialog="modalDel" :data="data"></os-del>
      <os-amarrac v-if="modalOs"  v-on:close="close()" v-on:atualizar="atualizar()" :dialog="modalOs"  :data="data"></os-amarrac>
      <local-geo  v-if="modalGeo" v-on:close="close()" v-on:atualizar="atualizar()" :dialog="modalGeo" :data="data.local_id"></local-geo>
    </div>
  </div>
</template>

<?php require_once 'src/components/os/_edtOs.php';?>
<?php require_once 'src/components/os/_delOs.php';?>
<?php require_once 'src/components/os/_tecOs.php';?> 
<?php require_once 'src/components/os/_amarracOs.php';?>

<?php require_once 'src/components/local/_geoLocal.php';?>
<?php require_once 'src/components/local/_rotaLocal.php';?>

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
      modalGeo: false,
    }
  },
  computed: {
    user()  {
      return this.$store.state.user;
    },
  },
  methods: {
    close(){
      this.modalGeo = false;
      this.modalTec = false;
      this.modalEdt = false;
      this.modalDel = false;
      this.modalOs  = false;
    },
    atualizar(){
      this.modalGeo = false;
      this.modalTec = false;
      this.modalEdt = false;
      this.modalDel = false;
      this.modalOs  = false;
      this.$emit('atualizar');
    }
  }
});
</script>

