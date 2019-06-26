
const getters = {
  //getSearch: state => state.tipoDeslocamentos,
  loading: state => state.loading,
  
  errorMessage: state => state.errorMessage,
  successMessage: state => state.successMessage,

  grupos: state => state.grupos,
  seguimentos: state => state.seguimentos,
  tipos: state => state.tipos,
  produtos: state => state.produtos,
  fabricantes: state => state.fabricantes,
  servicos: state => state.servicos,
  categorias: state => state.categorias,
  categoriaId: (state) => (id) => {
    return state.categorias.find(todo => todo.id === id)
  },
  getSearch: state => state.search,
  status: state => state.status,

  ufs: state => state.ufs,

  organizacao: state => state.proprietario,
  
  tecnicos: state => state.tecnicos,

  lojas: state => state.lojas,
  getTodoById: state => (id) => {
    return state.lojas.filter(loja => loja.id === id)
  },
  getLojaId: (state) => (id) => {
    return state.lojas.find(todo => todo.id == id)
    //return state.lojas.filter(loja => loja.id === id)
  },
  getLojaAtivo: (state) => () => {
    return state.lojas.filter(todo => todo.ativo === '0')
    //return state.lojas.filter(loja => loja.id === id)
  },
  getTodoBy: (state) => (id) => {
    return state.lojas.find(todo => todo.id === id)
  },

  local: state => state.local,
  locais: state => state.locais,
  getLocalId: (state) => (id) => {
    return state.locais.find(todo => todo.id === id)
  },
  getLocalLoja: (state) => (loja) => {
    return state.locais.filter(todo => todo.loja_id === loja)
  },
  getLocalLojaSingle: (state) => (loja) => {
    state.locais.filter(todo => todo.ativo === '0');
    return state.locais.find(todo => todo.loja_id === loja);
  },

  equipamentos: state => state.equipamentos,
  getEquipamentoLocal: (state) => (local) => {
    return state.equipamentos.filter(todo => todo.local_id === local);
  }
};
