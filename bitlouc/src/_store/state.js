/**
 * Vue.js with PHP Api
 * @author Fabio Bonina <fabio.bonina@gmail.com>
*/


const state = {
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
  tipos:[],
  fabricantes:[],
  categorias:[],
  servicos:[],
  tecnicos:[],
  nivel: '1',
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
