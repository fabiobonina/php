<template id="os-grid">
  <div>
  <v-layout row>
    <v-flex xs12>
      <v-card>
        <v-toolbar  dense color="blue">
          <v-toolbar-title class="white--text">oss</v-toolbar-title>
          <v-spacer></v-spacer>
        </v-toolbar>
        <v-layout wrap>
          <v-text-field v-model="configs.search" append-icon="search" label="Search" solo-inverted class="mx-3" flat></v-text-field>
          <v-flex xs3 sm6 md1>
            <v-subheader v-text="'Orden:'"></v-subheader>
          </v-flex>
          <v-flex xs5 sm6 md2>
            <v-select
              :items="itens"
              v-model="configs.orderBy"
              item-text="name"
              item-value="state"
              return-object
              label="Select"
              solo
            ></v-select>
          </v-flex>
          <v-flex xs1 sm2 md1>
            <v-btn flat icon color="blue"
              @click.native="configs.order == 'asc'? configs.order = 'desc': configs.order = 'asc'">
              <v-icon v-if="configs.order == 'asc'" dark>arrow_downward</v-icon>
              <v-icon v-else dark>arrow_upward</v-icon>
            </v-btn>
          </v-flex>
        </v-layout>
        <v-list two-line>
          <template v-for="(item, index) in filteredData">
          <v-card>
            <v-list-tile :key="item.name" avatar ripple @click="" >
              <v-list-tile-content>
                <router-link :to="'/oss/' + item.loja + '/os/' + item.id">
                <v-list-tile-title>{{item.lojaNick}} | {{item.local.tipo}} - {{item.local.name}} ({{item.local.municipio}}/{{item.local.uf}})</v-list-tile-title>
                <v-list-tile-sub-title class="text--primary">{{item.data}} | {{item.servico.name}} {{ item.categoria.name }}</v-list-tile-sub-title>
                </router-link>
                <v-list-tile-sub-title v-if="item.bem">{{item.bem.name}} {{item.bem.modelo}}  &nbsp; #{{item.bem.fabricanteNick}}
                  <v-chip small color="green" text-color="white">
                    <v-avatar class="green darken-4">
                      <v-icon small>mdi-qrcode</v-icon>
                    </v-avatar>
                    {{item.bem.numeracao}}
                  </v-chip>
                  <v-chip small color="orange" text-color="white">
                    <v-avatar class="orange darken-4">
                      <v-icon small>mdi-barcode</v-icon>
                    </v-avatar>
                    {{item.bem.plaqueta}}
                  </v-chip>
                </v-list-tile-sub-title>
              </v-list-tile-content>
              <v-chip small color="indigo" text-color="white">
                <v-avatar class="indigo darken-4">
                  <v-icon small class="icon">mdi-wrench</v-icon>
                </v-avatar>
                OS: {{item.filial}} - {{item.os}}
              </v-chip>
              <local-rota :lat="item.local.latitude" :long="item.local.longitude"></local-rota>
              <v-menu v-if="user.nivel > 2 && user.grupo == 'P'" bottom left  @click="">
                <v-btn slot="activator" small color="blue darken-2" dark fab>
                  <v-icon>mdi-information-variant</v-icon>
                </v-btn>
                <v-list>
                  <v-list-tile @click="modalOs = true; selecItem(item)">
                    <v-list-tile-title>
                      <span class="mdi mdi-wrench"></span>Amarrar OS
                    </v-list-tile-title>
                  </v-list-tile>
                  <v-list-tile @click="modalTec = true; selecItem(item)">
                    <v-list-tile-title>
                      <span class="mdi mdi-worker"></span>Tecnicos
                    </v-list-tile-title>
                  </v-list-tile>
                  <v-list-tile @click="modalEdt = true; selecItem(item)">
                    <v-list-tile-title>
                      <span class="mdi mdi-pencil"></span>Editar
                    </v-list-tile-title>
                  </v-list-tile>
                  <v-list-tile v-if="item.status == '0' && item.processo == '0' || user.nivel > 3" @click="modalDel = true; selecItem(item)">
                    <v-list-tile-title>
                      <span class="mdi mdi-delete"></span>Delete
                    </v-list-tile-title>
                  </v-list-tile>
                </v-list>
              </v-menu>
            </v-list-tile>
            <div>
              <v-chip small v-for="tecnico in item.tecnicos" :key="tecnico.id">
                <v-avatar small>
                  <img :src="tecnico.avatar" alt="trevor">
                </v-avatar>
                {{tecnico.userNick}}
              </v-chip>
            </div>
            
              <v-card-text>
              <progresso-os :data="item.processo"></progresso-os>
              </v-card-text>
            </v-card>
            <v-divider v-if="index + 1 < filteredData.length" :key="index"></v-divider>
          </template>
        </v-list>
      </v-card>
    </v-flex>
  </v-layout>
    
    <div>
      <os-tec v-if="modalTec" v-on:close="modalTec = false" :dialog="modalTec" data="modalItem" :data="modalItem"></os-tec>
      <os-edt v-if="modalEdt" v-on:close="modalEdt = false" :dialog="modalEdt" :data="modalItem"></os-edt>
      <os-del v-if="modalDel" v-on:close="modalDel = false" :dialog="modalDel" :data="modalItem"></os-del>
      <os-amarrac v-if="modalOs" v-on:close="modalOs = false" :dialog="modalOs" :data="modalItem"></os-amarrac>
    </div>
  </div>
</template>

<?php require_once 'src/components/atendimento/os/_addOs.php';?>
<?php require_once 'src/components/atendimento/os/_edtOs.php';?>
<?php require_once 'src/components/atendimento/os/_delOs.php';?>
<?php require_once 'src/components/atendimento/os/_tecOs.php';?> 
<?php require_once 'src/components/atendimento/os/_amarracOs.php';?>
<?php require_once 'src/components/local/_rotaLocal.php';?>

<script>
Vue.component('os-grid', {
  template: '#os-grid',
  props: {
    data: Array,
    status: String,
  },
  data: function () {
    return {
      sortKey: '',
      showModal: false,
      modalItem: {},
      modalTec: false,
      modalEdt: false,
      modalDel: false,
      modalOs: false,
      selected: [2],
      configs: {
        orderBy: { name: 'Data', state: 'data' },
        order: 'desc',
        search: ''
      },
      labels: ['Em trasito', 'Atendendo', 'Retorno Viagem', 'Completo' ],
      labels2: ['Atendimento', 'Concluido', 'Fechado', 'Validado' ],
      itens: [
        { name: 'Data', state: 'data' },
        { name: 'Local', state: 'local.name' },
        { name: 'Loja', state: 'loja' }
      ],
      fab: false,
      hover: false,
    }
  },
  computed: {
    user()  {
      return store.state.user;
    },
    filteredData2: function () {
      var filterKey = 0
      var data = this.data
      return data = data.filter(function (row) {
        return row.processo === filterKey;
      });
    },
    filteredData() {
      var status = this.status;
      var filter = this.configs.search && this.configs.search.toLowerCase();
      var list = _.orderBy(this.data, this.configs.orderBy.state, this.configs.order);
      //_.filter(list, repo => repo.status.indexOf(filter) >= 0);
      if(status){
      list = list.filter(function (row) {
        return Number(row.status) === Number(status);
      });
      }else{
        list = list.filter(function (row) {
          return Number(row.status) <= 1;
        });
      }
      
      if (filter) {
        list = list.filter(function (row) {
          return Object.keys(row).some(function (key) {
            return String(row[key]).toLowerCase().indexOf(filter) > -1
          })
        })
      }
      return list;
    }
  },
  methods: {
    onClose: function(){
      this.showModal = false;
    },
    selecItem: function(data){
      this.modalItem = data;
    },
    onAtualizar: function(){
      this.$store.dispatch('fetchLocais', this.$route.params._loja).then(() => {
        this.showModal = false;
      });
    },
  }
});

</script>

