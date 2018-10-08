
const getters = {
  isLoggedIn: state => {
    return state.isLoggedIn;
  },
  //getSearch: state => state.tipoDeslocamentos,
  getSearch: state => state.search,
  getStatus: state => state.status,
  getUser: state => state.user,
  getUsers: state => state.users,
  getProprietario: state => state.proprietario,
  getLojas: state => state.lojas,
  getLocais: state => state.locais,
  getLocal: state => state.local,
  getBens: state => state.bens,
  getEquipamentos: state => state.equipamentos,
  getTipos: state => state.tipos,
  getProdutos: state => state.produtos,
  getFabricantes: state => state.fabricantes,
  getCategorias: state => state.categorias,
  getServicos: state => state.servicos,
  getTecnicos: state => state.tecnicos,
  getOss: state => state.oss,
  getTodoById: state => (id) => {
    return state.lojas.filter(loja => loja.id === id)
  },
  getLojaId: (state) => (id) => {
    return state.lojas.find(todo => todo.id === id)
    //return state.lojas.filter(loja => loja.id === id)
  },
  getLojaAtivo: (state) => () => {
    return state.lojas.filter(todo => todo.ativo === '0')
    //return state.lojas.filter(loja => loja.id === id)
  },
  getTodoBy: (state) => (id) => {
    return state.lojas.find(todo => todo.id === id)
  },
  getLocalId: (state) => (id) => {
    return state.locais.find(todo => todo.id === id)
  },
  getLocalLoja: (state) => (loja) => {
    return state.locais.filter(todo => todo.loja_id === loja)
  },
  getLocalLojaSingle: (state) => (loja) => {
    state.locais.filter(todo => todo.ativo === '0')
    return state.locais.find(todo => todo.loja === loja)
  },
  getEquipamentosLocal: (state) => (local) => {
    return state.equipametos.filter(todo => todo.local_id === local)
  },
  getOssLoja: (state) => (loja) => {
    return state.oss.filter(todo => todo.loja === loja)
  },
  getOssLocal: (state) => (local) => {
    return state.oss.filter(todo => todo.local.id === local)
  },
  getOssStatus: (state) => (status) => {
    return state.oss.filter(todo => todo.status === status)
  },
  getOsId: (state) => (id) => {
    return state.oss.find(todo => todo.id === id)
  },
  getModOsTec: (state) => (os, tecnico) => {
    return state.oss.filter(todo => todo.os === os && todo.tecnico === tecnico)
  },
}
