
<template id="os">
  <div>
  <top></top>
  <v-content v-if="_os">
    <template>
      <v-card flat height="210px" tile color="grey lighten-2">
        <v-toolbar color="cyan" prominent class="white--text" height="80px">
          <v-btn @click="$router.go(-1)" icon >
            <v-icon class="white--text">arrow_back</v-icon>
          </v-btn>
          <div>
            <div class="title">{{_os.loja_nick}} | {{_os.local_tipo}} - {{_os.local_name}} ({{_os.local_municipio}}/{{_os.local_uf}})</div>
            <div>{{_os.data}} | {{_os.servico.name}} - {{ _os.categoria.name }}</div>
            <div v-if="_os.equipamento">{{_os.equipamento.name}} - {{_os.equipamento.modelo}} 
              <v-chip small color="green" text-color="white">
                <v-avatar class="green darken-4">
                  <v-icon small>mdi-qrcode</v-icon>
                </v-avatar>
                {{_os.equipamento.numeracao}}
              </v-chip>
              <v-chip small color="orange" text-color="white">
                <v-avatar class="orange darken-4">
                  <v-icon small>mdi-barcode</v-icon>
                </v-avatar>
                {{_os.equipamento.plaqueta}}
              </v-chip>
              <a>#{{_os.equipamento.fabricante_nick}} </a>
            </div>
          </div>
          <div slot="extension" class="white--text">
            <v-chip small v-for="tecnico in _os.tecnicos" :key="tecnico.id">
              <v-avatar small>
                <img :src="tecnico.avatar" alt="trevor">
              </v-avatar>
              {{tecnico.user_nick}}
            </v-chip>
          </div>
          <v-spacer></v-spacer>
          <v-chip small color="indigo" text-color="white">
            <v-avatar class="indigo darken-4">
              <v-icon small class="icon">mdi-wrench</v-icon>
            </v-avatar>
            OS: {{_os.filial}} - {{_os.os}}
          </v-chip>
          <local-rota :lat="_os.local_lat" :long="_os.local_long"></local-rota>
        </v-toolbar>
        <div>
        <progresso-os :data="_os.status"></progresso-os>
        </div>
      </v-card>
    </template>
    <v-container fluid>
        <div v-if="user.nivel > 1 && user.grupo == 'P'">
          <v-btn v-if="_os.status < 4 " v-on:click="deslocAdd = true" dark small color="primary">
            <v-icon dark>mdi-walk</v-icon> Desloc.
          </v-btn>
          <v-btn v-if="_os.status < 4" v-on:click="notaAdd = true" dark small color="primary">
            <v-icon dark>mdi-note-text</v-icon> Nota
          </v-btn>
          <v-btn v-if="_os.status > 1 && _os.status < 3 && _os.tecnicos.length > 0" v-on:click="antendimentoReabrir()" dark small color="amber">
            <v-icon dark>mdi-undo-variant</v-icon> Reabrir Atendimento
          </v-btn>
          <v-btn v-if="_os.status == 0 && _os.tecnicos.length > 0" v-on:click="antendimentoInicio()" dark small color="green">
            <v-icon dark>mdi-loading mdi-spin</v-icon> Iniciar Atendimento
          </v-btn>
          <v-btn v-if="_os.status == 1 " v-on:click="antendimentoFinal()" dark small color="green">
            <v-icon dark>mdi-check</v-icon> Encerrar Atendimento
          </v-btn>
          <v-btn v-if="_os.notas && _os.status > 1 && _os.status < 4 && _os.os == ''" v-on:click="osConcluir()" dark small color="primary">
            <v-icon dark>mdi-check</v-icon> Concluir OS
          </v-btn>
          <v-btn v-if="user.nivel > 2 && _os.status == 4" v-on:click="osReabrir()" dark small color="amber">
            <v-icon dark>mdi-reply</v-icon> Reabrir OS
          </v-btn>
          <v-btn v-if="user.nivel > 2 && _os.status == 4"  v-on:click="osFechar()" dark small color="primary">
            <v-icon dark>mdi-check</v-icon> Fechar OS
          </v-btn>
          <v-btn v-if="user.nivel > 3 && _os.status == 5"  v-on:click="osValidar()" dark small color="primary">
            <v-icon dark>mdi-check</v-icon> Validar OS
          </v-btn>
        </div>
      <div>
        <v-flex xs12>
          <v-container grid-list-xl>
            <v-layout row wrap>
              <v-flex xs12 md7>
                <div v-for="tecnico in _os.tecnicos" :key="tecnico.id">
                  <v-card>
                    <v-toolbar dense color="blue">
                      <v-toolbar-title class="white--text">@{{tecnico.user_nick}}</v-toolbar-title>
                      <v-spacer></v-spacer>
                      <v-btn v-if="_os.status < 4" @click="modAdd=true; selecItem(tecnico)" color="pink" dark small fab right>
                        <v-icon>add</v-icon>
                      </v-btn>
                      <!--v-btn  @click="modAdd=true; selecItem(tecnico)" color="pink" dark small absolute fab right>
                        <v-icon>add</v-icon>
                      </v-btn-->
                    </v-toolbar>
                    <v-list two-line>
                      <template v-for="(item, index) in tecnico.mods">
                        <v-list-tile append v-on:click.native="" activator slot :key="item.id">
                          <v-list-tile-action>
                            {{ item.status.tipo }}
                          </v-list-tile-action>
                          <v-list-tile-content dense>
                            <v-list-tile-title> {{item.dtInicio}} </v-list-tile-title>
                            <v-list-tile-title>  {{item.dtFinal}} </v-list-tile-title>
                          </v-list-tile-content>
                          <v-list-tile-content>
                            <v-list-tile-title><v-icon>mdi-clock</v-icon> {{ item.tempo }}h </v-list-tile-title>
                            <v-list-tile-title><v-icon>mdi-cash-usd</v-icon> {{ item.hhValor }}hh </v-list-tile-title>
                          </v-list-tile-content>
                          <v-list-tile-content>
                            <v-list-tile-title>{{ item.kmInicio }}Km</v-list-tile-title>
                            <v-list-tile-title>{{ item.kmFinal }}Km</v-list-tile-title>
                          </v-list-tile-content>
                          <v-list-tile-content>
                            <v-list-tile-title> {{ item.kmFinal - item.kmInicio }}km <v-icon>mdi-road-variant</v-icon> </v-list-tile-title>
                            <v-list-tile-title>{{ item.valor }} <v-icon>mdi-cash-usd</v-icon></v-list-tile-title>
                          </v-list-tile-content>
                          <v-list-tile-action>
                            <v-speed-dial
                              v-if="_os.status < 4"
                              direction="left"
                              :open-on-hover="hover"
                              transition="slide-x-reverse-transition"
                              >
                              <v-btn slot="activator" small color="blue darken-2" dark fab>
                                <v-icon>mdi-information-variant</v-icon>
                                <v-icon>close</v-icon>
                              </v-btn>
                              <v-btn v-on:click="modEdt = true; selecItem(item)" fab dark small color="green">
                                <v-icon>edit</v-icon>
                              </v-btn>
                              <v-btn fab dark small color="indigo">
                                <v-icon>add</v-icon>
                              </v-btn>
                              <v-btn v-on:click="modDel(item)" fab dark small color="red" >
                                <v-icon>delete</v-icon>
                              </v-btn>
                            </v-speed-dial>
                          </v-list-tile-action>
                        </v-list-tile>
                        <v-divider v-if="index + 1 < tecnico.mods.length" :key="index"></v-divider>
                      </template>
                    </v-list>
                  </v-card>
                </div>
              </v-flex>

              <v-flex xs12 md5>
                <div class="column">
                  <v-card v-for="nota in _os.notas" :key="nota.id">
                    <v-card-title>
                      <span class="caption"> <span > Data:</span> <span>{{ nota.data }}</span> Usuario: <span>{{ nota.user }}</p></span>
                    </v-card-title>
                    <v-container>
                      <div>
                        <div>
                          <p>{{ nota.descricao}}</p>
                        </div>
                        <nav class="level is-mobile">
                          <div class="level-left">
                            <a v-if="_os.status < 4" v-on:click="notaEdt = true; selecItem(nota)" class="level-item">
                              <span class="mdi mdi-note-text"></span> Editar
                            </a>
                          </div>
                        </nav>
                      </div>
                    </v-container>
                  </v-card>
                </div>
              </v-flex>
            </v-layout>
          </v-container>
        </v-flex>
      </div>
      <div>
        <mod-add v-if="modAdd && _os.status < 4" v-on:close="modAdd = false; onAtualizar()" :dialog="modAdd" :data="_item"></mod-add>
        <mod-edt v-if="modEdt && _os.status < 4" v-on:close="modEdt = false; onAtualizar()" :dialog="modEdt" :data="_item"></mod-edt>
        <nota-add v-if="notaAdd && _os.status < 4" v-on:close="notaAdd = false; onAtualizar()" :dialog="notaAdd" :data="_os"></nota-add>
        <nota-edt v-if="notaEdt && _os.status < 4" v-on:close="notaEdt = false; onAtualizar()" :dialog="notaEdt" :data="_item"></nota-edt>
        <desloc-add v-if="deslocAdd && _os.status < 4" v-on:close="deslocAdd = false; onAtualizar()" :dialog="deslocAdd" :data="_os"></desloc-add>
      </div>

      </v-container>
    </v-content>
  </div>
</template>
<script>
var Os = Vue.extend({
  template: '#os',
  data: function () {
    return {
      errorMessage: [],
      successMessage: [],
      search: '',
      _item: null,
      isLoading: false,
      deslocAdd: false,
      deslocChg: false,
      modFull:    false,
      modAdd:    false,
      modEdt:    false,
      notaAdd:   false,
      notaEdt:   false,
      fab: false,
      hover: false,
      selectedCategoria: 'All',
      active: '1',
      name: '',
      configs: {
        order: 'asc',
        search: ''
      },
      itens: [
        { name: 'Nome', state: 'name' },
        { name: 'Regional', state: 'regional' }
      ],    
    };
  },
  created: function() {
    this.$store.dispatch('findOs', this.$route.params._os).then(() => {
      console.log("Buscando dados da os")
    });
    
  },
  mounted: function() {
    //this.modalDeslocAdd = true;
  },
  computed: {
    //loja()  {
      //return store.getters.getOsId(this.$route.params._loja);
    //},
    _os()  {
      return store.state.os;
    },
    user()  {
      return store.state.user;
    },
  }, // computed
  methods: {
    osStatus: function( status) {
        this.isLoading = true
        var postData = {
          os_id:  this._os.id,
          status: status
        };
        //console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=osStatus', postData).then(function(response) {
          console.log(response);
          if(!response.data.error){
            this.successMessage.push(response.data.message);
            this.isLoading = false;
            this.onAtualizar();
          } else{            
            this.errorMessage = response.data.message;
            this.isLoading = false;
          }
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    antendimentoReabrir: function() {
      if(confirm('Deseja Reabrir Atendimento?')){
        this.osStatus( '0')
      }
    },
    antendimentoInicio: function() {
      if(confirm('Deseja iniciar Atendimento?')){
        this.osStatus( '1')
      }
    },
    antendimentoFinal: function() {
      if(confirm('Deseja encerrar Atendimento?')){
        this.osStatus( '2')
      }
    },
    osReabrir: function() {
      if(confirm('Deseja realmente Reabrir a OS?')){
        this.osStatus( '3')
      }
    },
    osConcluir: function() {
      if(confirm('Deseja Concluir a OS?')){
        this.osStatus( '4')
      }
    },
    osFechar: function() {
      if(confirm('A OS foi fechada no Sistema?')){
        this.osStatus('5');
      }
    },
    osValidar: function() {
      if(confirm('Foi recebido o Relatorio devidaente assinado desse Atendimento?')){
        this.osStatus('6');
      }
    },
    modDel: function(data) {
      if(confirm('Deseja realmente deletar ' + data.status.tipo + '?')){
        this.isLoading = true
        var postData = {
          id: data.id
        };
        //console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=modDel', postData).then(function(response) {
          //console.log(response);
          if(response.data.error){
            this.errorMessage = response.data.message;
            this.isLoading = false;
          } else{
            this.successMessage.push(response.data.message);
            this.isLoading = false;
            this.onAtualizar();
            setTimeout(() => {
              this.$emit('close');
            }, 2000);
          }
        })
        .catch(function(error) {
          console.log(error);
        });
      }
    },
    onAtualizar: function(){
      this.$store.dispatch('findOs', this.$route.params._os).then(() => {
        console.log("Buscando dados da os")
      });
    },
    selecItem: function(data){
      this._item = data;
    },
  },
});

</script>

<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>
<?php require_once 'src/components/servicos/nota/nota-add.php';?>
<?php require_once 'src/components/servicos/nota/nota-edt.php';?>
<?php require_once 'src/components/servicos/tecnico/deslocamento/desloc-add.php';?>
<?php require_once 'src/components/servicos/tecnico/mod/mod-add.php';?>
<?php require_once 'src/components/servicos/tecnico/mod/mod-edt.php';?>
<?php require_once 'src/components/servicos/tecnico/mod/mod-full.php';?>
<?php require_once 'src/components/servicos/tecnico/tecnico.php';?>
<?php require_once 'src/components/servicos/despesa/_km.php';?>
<?php require_once 'src/components/servicos/despesa/despesa.php';?>

<?php require_once 'src/components/local/_rotaLocal.php';?>

<?php require_once 'src/components/os/_progresso.php';?>