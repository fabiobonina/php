/**
 * Vue.js with PHP Api
 * @author Fabio Bonina <fabio.bonina@gmail.com>
*/
//Todos os postdados são enviados como json
//True para enviar como dados do formulário



const state = {
  isLoggedIn: !!localStorage.getItem("token"),
  token: atob(localStorage.getItem("token")),
  statusBens: [
    { id:'0', name: 'Instalação', ativo: '0', icon: 'done' },
    { id:'1', name: 'Operação', ativo: '1', icon: 'done' },
    { id:'2', name: 'Ocioso', ativo: '2', icon: 'done' },
  ],
  deslocTrajetos: [],
  deslocStatus: [],
  proprietario:{},
  lojas: [],
  loja: [],
  locais: [],
  local: {},
  bens: [],
  equipamentos: [],
  users:[],
  user:[],
  tipos:[],
  produtos:[],
  fabricantes:[],
  categorias:[],
  servicos:[],
  tecnicos:[],
  osProprietario:{},
  osLojas:[],
  oss:[],
  ocorrencias:[],
  osUf:[],
  mods:[],
  grupos:[],
  seguimentos:[],
  search:'',
  status:'0',
}
