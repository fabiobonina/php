<template id="logout">

    <v-btn class="grey darken-3" @click="logout()" flat>sair</v-btn>
  
</template>

<script>
Vue.use(VeeValidate)
Vue.component('logout', {
  name: 'logout',
  template: '#logout',
  data: function () {
    return {

    };
  },
  mounted () {
  },
  computed: {

  },
  methods: {
    logout(){
        this.logout;
        //this.$emit('close');
      },
      
      ...Vuex.mapActions({logout: "logout"}),
  }
});
</script>