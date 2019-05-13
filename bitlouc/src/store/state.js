/**
 * Vue.js with PHP Api
 * @author Fabio Bonina <fabio.bonina@gmail.com>
*/
//Todos os postdados são enviados como json
//True para enviar como dados do formulário



const state = {
  isLoggedIn: !!localStorage.getItem("token"),
  token: atob(localStorage.getItem("token")),
  user: {},
  statusBens: [
    { id:'0', name: 'Instalação', ativo: '0', icon: 'done' },
    { id:'1', name: 'Operação', ativo: '1', icon: 'done' },
    { id:'2', name: 'Ocioso', ativo: '2', icon: 'done' },
  ],
  deslocTrajetos: [],
  deslocStatus: [],
  lojas: [],
  loja: [],
  locais: [],
  local: {},
  equipamentos: [],
  users:[],
  tipos:[],
  produtos:[],
  fabricantes:[],
  categorias:[],
  cilindros:[],
  cilindro:[],
  cilProgramacoes:[],
  cilProgramacao:{},
  cilDemanda:{},
  cilItems:{},
  cil_tipos:[],
  servicos:[],
  tecnicos:[],
  nivel: '1',
  os:{},
  oss:[],
  osLojas:[],
  ocorrencias:[],
  osUf:[],
  proprietario:{},
  mods:[],
  grupos:[],
  seguimentos:[],
  search:'',
  status:'0',
  ufs:{},
  count: 0,
  loading: false,
}
