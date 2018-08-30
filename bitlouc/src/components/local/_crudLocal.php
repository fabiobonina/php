<template id="local-crud">
  <div>
    <v-speed-dial 
      v-if="user.nivel > 2 && user.grupo == 'P'"
      v-model="fab" :open-on-hover="hover"
      direction="left" transition="slide-x-reverse-transition">
      <v-btn slot="activator" v-model="fab" small color="blue darken-2" dark fab>
        <v-icon>mdi-information-variant</v-icon>
        <v-icon>close</v-icon>
      </v-btn>
      <v-btn @click="modalGeo = true; selecItem(item)" fab dark small color="indigo">
        <v-icon>mdi-map-marker-plus</v-icon>
      </v-btn>
      <v-btn @click="modalCat = true; selecItem(item)" fab dark small color="purple">
        <v-icon>label</v-icon></span>
      </v-btn>
      <v-btn @click="modalEdt = true; selecItem(item)" fab dark small color="green">
        <v-icon>edit</v-icon>
      </v-btn>
      <v-btn v-if="user.nivel > 3" @click="modalDel = true; selecItem(item)" fab dark small color="red">
        <v-icon>delete</v-icon>
      </v-btn>
    </v-speed-dial>
    <div>
      <local-add v-if="modalAdd" v-on:close="modalAdd = false" :dialog="modalAdd"></local-add>
      <local-geo v-if="modalGeo" v-on:close="modalGeo = false" :dialog="modalGeo" :data="data"></local-geo>
      <local-edt v-if="modalEdt" v-on:close="modalEdt = false" :dialog="modalEdt" :data="data"></local-edt>
      <local-del v-if="modalDel" v-on:close="modalDel = false" :dialog="modalDel" :data="data"></local-del>
      <local-cat v-if="modalCat" v-on:close="modalCat = false" :dialog="modalCat" :data="data"></local-cat>
    </div>
  </div>
</template>
<script>
Vue.component('local-crud', {
  template: '#local-crud',
  props: {
    data: Object
  },
  data: function () {
    return {
      fab: false,
      hover: false,
      modalAdd: false,
      modalEdt: false,
      modalDel: false,
      modalCat: false,
      modalGeo: false,
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

<?php require_once 'src/components/local/_addLocal.php';?>
<?php require_once 'src/components/local/_geoLocal.php';?>
<?php require_once 'src/components/local/_edtLocal.php';?>
<?php require_once 'src/components/local/_delLocal.php';?>
<?php require_once 'src/components/local/_catLocal.php';?>