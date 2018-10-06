
var NaoEncontrado = Vue.extend({
  template: '#naoEncontrado',
  data: function () {
    return {item: '' };
  },
  methods: {
    deleteProduct: function () {
      //products.splice(findProductKey(this.$route.params._id), 1);
      //router.push('/');
    }
  }
});
Vue.component('todo-item', {
  template: `
    <li>
      {{ user }}
      <button class="delete" aria-label="close" v-on:click="$emit(\'remove\')"></button>
    </li>
  `,
  props: ['user']
});


var router = new VueRouter({
  routes: [
    { path: '/', component: Home,
      children: [
        { path: '', component: Dashboard },
      ]
    },
    { path: '/oss', component: Oss,
      children: [
        { path: '', component: OsLojas },
        { path: 'os-status', component: OsStus },
        { path: 'os-tec', component: TecOs },
      ] 
    },
    { path: '/oss/:_id/os/:_os', component: Os, name: 'os'},
    { path: '/lojas', component: Lojas, name: 'lojas' },
    { path: '/loja/:_id', component: Loja,
      children: [
        { path: '', component: LocaisIndex },
        { path: 'oss', component: LojaOss },
        //{ path: 'bens', component: LojaBens },
      ]
    },
    /*{ path: '/local/:_local', component: Local,
      children: [
        { path: '', component: Bens },
        //{ path: 'oss', component: LojaOss },
        //{ path: 'bens', component: LojaBens },
      ]
    },*/
    { path: '/proprietario', component: Proprietario,
      children: [
        { path: '', component: LojasPlus },
        { path: 'locais', component: LocaisPlus },
        { path: 'oss', component: OssPlus },
        //{ path: 'bens', component: LojaBens },
      ]
    },
    { path: '/loja/:_id/local/:_local', component: Local,
      children: [
        { path: '', component: EquipamentosLocal },
        { path: 'oss', component: LocalOss },
      ]
    },
    /*{path: '/oss/:_id/os/:_os', component: Os, name: 'os'},
    {path: '/projeto', component: Projeto,
      children: [
        { path: '', component: Dashboard },
        { path: 'oss', component: OssHome,
          children: [
          { path: '', component: Oss },
          { path: 'oss-tec', component: OssTec },
          { path: 'oss-status', component: OssStus },
        ] },
        { path: 'lojas', component: Lojas },
        { path: 'oss-tec', component: OssTec },
      ]
    },*/
    {path: '*', component: NaoEncontrado},
    /*{path: '/config', component: Loja,
    children: [
        {path: '', components: { 
            default: SegList,
            ordem: OrdemList,
            grupo: GrupoList,
            fab: FabList
            }, name:'Configuração'},
      ]
    },*/
  ]
});
