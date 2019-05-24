
const getters = {
  //getSearch: state => state.tipoDeslocamentos,
  loading: state => state.loading,

  grupos: state => state.grupos,
  seguimentos: state => state.seguimentos,
  tipos: state => state.tipos,
  produtos: state => state.produtos,
  fabricantes: state => state.fabricantes,
  categorias: state => state.categorias,
  servicos: state => state.servicos,

  getSearch: state => state.search,
  status: state => state.status,

  organizacao: state => state.proprietario,
  lojas: state => state.lojas,
  locais: state => state.locais,
  local: state => state.local,
  equipamentos: state => state.equipamentos,
  tecnicos: state => state.tecnicos,
  oss: state => state.oss,
  os: state => state.os,
  ocorrencias: state => state.ocorrencias,
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
  getLocalId: (state) => (id) => {
    return state.locais.find(todo => todo.id === id)
  },
  getLocalLoja: (state) => (loja) => {
    return state.locais.filter(todo => todo.loja_id === loja)
  },
  getLocalLojaSingle: (state) => (loja) => {
    state.locais.filter(todo => todo.ativo === '0')
    return state.locais.find(todo => todo.loja_id === loja)
  },
  getEquipamentoLocal: (state) => (local) => {
    return state.equipamentos.filter(todo => todo.local_id === local)
  },
  getOssLoja: (state) => (loja) => {
    return state.oss.filter(todo => todo.loja_id === loja)
  },
  getOssLocal: (state) => (local) => {
    return state.oss.filter(todo => todo.local.id === local)
  },
  getOssUF: (state) => (uf) => {
    return state.oss.filter(todo => todo.uf == uf)
  },
  getUF: (state) => (id) => {
    return state.osUf.find(todo => todo.id == id)
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
