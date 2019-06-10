
var NaoEncontrado = Vue.extend({
  template: '#naoEncontrado',
  data: function () {
    return {item: '' };
  },
  methods: {
    deleteProduct: function () {
      //products.splice(findProductKey(this.$route.params._loja), 1);
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
  //mode: 'history',
  routes: [
    { path: '/login', component: LoginPage },
    { path: '/register', component: RegisterPage },
    { path: '/', component: HomePage,
      children: [
        { path: '', component: Home },
      ]
    },
    { path: '/organizacao', component: Organizacao,
      children: [
        { path: '', component: OrganPage },
        { path: 'loja', component: LojasPage},
        { path: 'loja/:_loja', component: LojaShow,
          children: [
            { path: '', component: LocaisIndex },
            { path: 'oss', component: LojaOss },
            //{ path: 'bens', component: LojaBens },
          ]
        },
        { path: 'oss', component: LojaOss },
        //{ path: 'bens', component: LojaBens },
        { path: 'local', component: LocaisPage },
      ]
    },
    { path: '/organizacao/loja/:_loja/local/:_local', component: Local,
      children: [
        { path: '', component: EquipamentosLocal },
        { path: 'oss', component: LocalOss },
      ]
    },
    { path: '/organizacao/gerencial', component: Gerencial,
      children: [
        { path: '', component: LojasPlus },
        { path: 'locais', component: LocaisPlus },
        //{ path: 'oss', component: OssPlus },
        //{ path: 'bens', component: LojaBens },
      ]
    },
    { path: '/atendimento', component: AtendimentoPainel},
    { path: '/atendimento/oss', component: Oss,
      children: [
        { path: '', component: OsUF },
        { path: 'uf/:_uf', component: UFList },
        { path: 'os-status', component: OsStus },
        { path: 'os-tec', component: TecOs },
        //{ path: 'show/:_os', component: Os, name: 'os'},
      ]  
    },
    { path: '/atendimento/show/:_os', component: Os, name: 'os'},
    { path: '/atendimento/os-gerencial', component: OsGerencial,
      children: [
        { path: '', component: OsAmarar },
        { path: 'fechar', component: OsFechar },
        { path: 'validar', component: OsValidar },
        //{ path: 'bens', component: LojaBens },
      ]
    },
    { path: '/controle-cilindros', component: ControleCilindros,
      children: [
        { path: '', component: PainelCilindros },
        { path: 'cilindros', component: CilindrosPage },
        { path: 'programacao', component: ProgramacaoPage },
        { path: 'programacao/show/:_programacao', component: ProgramacaoShow },
      ] 
    },
    { path: '/os/:_os', component: OsVersao, name: 'os-versao'},
    /*{ path: '/lojas', component: Lojas, name: 'lojas' },
    { path: '/loja/:_loja', component: Loja,
      children: [
        { path: '', component: LocaisIndex },
        { path: 'oss', component: LojaOss },
        //{ path: 'bens', component: LojaBens },
      ]
    },
    //{ path: '/', component: System, name:'system'},
    /*{ path: '/', component: System,
      children: [
        { path: '', component: Dashboard },
      ]
    },
    
    { path: '/os/:_os', component: Os, name: 'os'},
    { path: '/lojas', component: Lojas, name: 'lojas' },
    { path: '/loja/:_loja', component: Loja,
      children: [
        { path: '', component: LocaisIndex },
        { path: 'oss', component: LojaOss },
        //{ path: 'bens', component: LojaBens },
      ]
    },
    
    { path: '/organozacao/gerencial', component: Gerencial,
      children: [
        { path: '', component: LojasPlus },
        { path: 'locais', component: LocaisPlus },
        { path: 'oss', component: OssPlus },
        //{ path: 'bens', component: LojaBens },
      ]
    },
    { path: '/os-gerencial', component: OsGerencial,
      children: [
        { path: '', component: OsAmarar },
        { path: 'fechar', component: OsFechar },
        { path: 'validar', component: OsValidar },
        //{ path: 'bens', component: LojaBens },
      ]
    },
    { path: '/loja/:_loja/local/:_local', component: Local,
      children: [
        { path: '', component: EquipamentosLocal },
        { path: 'oss', component: LocalOss },
      ]
    },*/
    {path: '*', component: NaoEncontrado},
  ]
});
router.beforeEach((to, from, next) => {
  // redirect to login page if not logged in and trying to access a restricted page
  const publicPages   = ['/login', '/register'];
  const authRequired  = !publicPages.includes(to.path);
  const loggedIn      = localStorage.getItem('user');
  const isLoggedIn    = !!localStorage.getItem('token');
  //console.log(isLoggedIn)
  if (authRequired && !loggedIn && !isLoggedIn) {
    return next('/login');
  }

  next();
});

