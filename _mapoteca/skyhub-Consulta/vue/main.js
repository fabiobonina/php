// main.js
import Vue from 'vue'  
import UsersTable from './components/Users/Table.vue'  
import UsersForm from './components/Users/Form.vue'  
import RootHeader from './components/Root/Header.vue' 

Vue.component('UsersTable', UsersTable)  
Vue.component('UsersForm', UsersForm)

new Vue({  
  // componentes locais que só existem e podem ser usados na raiz
  components: { RootHeader },
  // body ou outro elemento compartilhado em todas as páginas.
  el: 'body'
})