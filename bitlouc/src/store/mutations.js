/**
 * Vue.js with PHP Api
 * @author Fabio Bonina <fabio.bonina@gmail.com>
*/
//Todos os postdados são enviados como json
//True para enviar como dados do formulário


const LOGIN = "LOGIN";
const LOGIN_SUCCESS = "LOGIN_SUCCESS";
const LOGOUT = "LOGOUT";

const mutations = {
  [LOGIN](state) {
    state.pending = true;
  },
  [LOGIN_SUCCESS](state) {
    state.isLoggedIn = !!localStorage.getItem("token");
    state.pending = false;
  },
  [LOGOUT](state) {
    state.isLoggedIn = false;
    state.token = NULL;
    state.user = "";
  },
  SET_SEARCH(state, search) {
    state.search = search
  },
  SET_STATUS(state, status) {
    state.status = status
  },
  SET_PROPRIETARIO(state, proprietario) {
    state.proprietario = proprietario
  },
  SET_USERS(state, users) {
    state.users = users
  },
  SET_USER(state, user) {
    state.user = user
  },
  SET_LOGAR(state, creds) {
    state.user = creds.user
    state.isLoggedIn = creds.isLoggedIn;
    state.token = creds.token ;
  },
  SET_LOJA(state, loja) {
    state.loja = loja
  },
  SET_LOJAS(state, lojas) {
    state.lojas = lojas
  },
  SET_LOCAL(state, local) {
    state.local = local
  },
  SET_LOCAIS(state, locais) {
    state.locais = locais
  },
  SET_EQUIPAMENTOS(state, equipamentos) {
    state.equipamentos = equipamentos
  },
  SET_TIPOS(state, tipos) {
    state.tipos = tipos
  },
  SET_PRODUTOS(state, produtos) {
    state.produtos = produtos
  },
  SET_FABRICANTES(state, fabricantes) {
    state.fabricantes = fabricantes
  },
  SET_CATEGORIAS(state, categorias) {
    state.categorias = categorias
  },
  SET_SERVICOS(state, servicos) {
    state.servicos = servicos
  },
  SET_TECNICOS(state, tecnicos) {
    state.tecnicos = tecnicos
  },
  SET_UF(state, ufs) {
    state.ufs = ufs
  },
  SET_NIVEL(state, nivel){
    state.nivel = nivel
  },
  SET_OS(state, os) {
    state.os = os
  },
  SET_OSS(state, oss) {
    state.oss = oss
  },
  SET_OSLOJAS(state, osLojas) {
    state.osLojas = osLojas
  },
  SET_OCORRENCIAS(state, ocorrencias) {
    state.ocorrencias = ocorrencias
  },
  SET_OSUF(state, osUf) {
    state.osUf = osUf
  },
  SET_MODS(state, mods) {
    state.mods = mods
  },
  SET_SEGUIMENTOS(state, seguimentos) {
    state.seguimentos = seguimentos
  },
  SET_GRUPOS(state, grupos) {
    state.grupos = grupos
  },
  SET_DESLOC_TRAJETOS(state, deslocTrajetos) {
    state.deslocTrajetos = deslocTrajetos
  },
  SET_DESLOC_STATUS(state, deslocStatus) {
    state.deslocStatus = deslocStatus
  },
  SET_CILINDROS(state, cilindros) {
    state.cilindros = cilindros
  },
  SET_CILPROGRMACOES(state, cilProgramacoes) {
    state.cilProgramacoes = cilProgramacoes
  }, 
  SET_CIL_TIPOS(state, cil_tipos) {
    state.cil_tipos = cil_tipos
  }
}
