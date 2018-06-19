
<template id="os">
  <div>
  <top></top>
  <v-content>
    <template>
      <v-card flat height="210px" tile color="grey lighten-2">
        <v-toolbar color="cyan" prominent class="white--text" height="80px">
          <v-btn @click="$router.go(-1)" icon >
            <v-icon class="white--text">arrow_back</v-icon>
          </v-btn>
          <div>
            <div class="title">{{_os.lojaNick}} | {{_os.local.tipo}} - {{_os.local.name}} ({{_os.local.municipio}}/{{_os.local.uf}})</div>
            <div>{{_os.data}} | {{_os.servico.name}} - {{ _os.categoria.name }}</div>
            <div v-if="_os.bem">{{_os.bem.name}} {{_os.bem.modelo}} 
              <v-chip small color="green" text-color="white">
                <v-avatar class="green darken-4">
                  <v-icon small class="mdi mdi-qrcode"></v-icon>
                </v-avatar>
                {{_os.bem.numeracao}}
              </v-chip>
              <v-chip small color="orange" text-color="white">
                <v-avatar class="orange darken-4">
                  <v-icon small class="mdi mdi-barcode"></v-icon>
                </v-avatar>
                {{_os.bem.plaqueta}}
              </v-chip>
              <a>#{{_os.bem.fabricanteNick}} </a>
            </div>
          </div>
          <div slot="extension" class="white--text">
            <v-chip small v-for="tecnico in _os.tecnicos" :key="tecnico.id">
              <v-avatar small>
                <img :src="tecnico.avatar" alt="trevor">
              </v-avatar>
              {{tecnico.userNick}}
            </v-chip>
          </div>
          <v-spacer></v-spacer>
          <v-chip color="indigo" text-color="white">
            <v-avatar >
              <v-icon small class="icon">mdi-wrench</v-icon>
            </v-avatar>
            OS: {{_os.filial}} - {{_os.os}}
          </v-chip>

          <v-btn icon dark large color="primary" :disabled=" 0.000000 == _os.local.latitude" :href="'https://maps.google.com/maps?q='+ _os.local.latitude + ',' + _os.local.longitude" target="_blank"> 
            <v-icon>directions</v-icon>
          </v-btn>
        </v-toolbar>
        <div>
        <progresso-os :data="_os.processo"></progresso-os>
        </div>
      </v-card>
    </template>
    <v-container fluid>
        <div v-if="user.nivel > 1 && user.grupo == 'P'">
          <v-btn v-if="_os.status <= 1 " v-on:click="modalDeslocAdd = true" dark small color="primary">
            <v-icon dark>mdi-walk</v-icon> Desloc.
          </v-btn>
          <v-btn v-if="!_os.notas" v-on:click="modalNotaAdd = true" dark small color="primary">
            <v-icon dark>mdi-note-text</v-icon> Nota
          </v-btn>
          <v-btn v-if="_os.notas && _os.processo >= 2 && _os.status == 1" v-on:click="osConcluir()" dark small color="primary">
            <v-icon dark>mdi-check</v-icon> Concluir OS
          </v-btn>
          <v-btn v-if="user.nivel > 2 && _os.status == 2" v-on:click="osReabrir()" dark small color="primary">
            <v-icon dark>mdi-reply</v-icon> Reabrir OS
          </v-btn>
          <v-btn v-if="user.nivel > 2 && _os.status == 2"  v-on:click="osFechar()" dark small color="primary">
            <v-icon dark>mdi-check</v-icon> Fechar OS
          </v-btn>
          <v-btn v-if="user.nivel > 3 && _os.status == 3"  v-on:click="osValidar()" dark small color="primary">
            <v-icon dark>mdi-check</v-icon> Validar OS
          </v-btn>
        </div>
      <div>
        <v-flex xs12>
          <v-container grid-list-xl>
            <v-layout row wrap>
              <v-flex xs12 md7>
                <div v-for="tecnico in _os.tecnicos">
                  <v-card>
                    <v-toolbar dense color="blue">
                      <v-toolbar-title class="white--text">@{{tecnico.userNick}}</v-toolbar-title>

                      <v-flex xs12 sm1>
                        <v-btn flat icon class="white--text"
                        @click.native="configs.order == 'asc'? configs.order = 'desc': configs.order = 'asc'">
                        <v-icon v-if="configs.order == 'asc'" dark>arrow_downward</v-icon>
                        <v-icon v-else dark>arrow_upward</v-icon>
                        </v-btn>
                      </v-flex>
                      <v-spacer></v-spacer>
                      <v-btn  @click="modAdd=true" color="pink" dark small absolute fab right>
                        <v-icon>add</v-icon>
                      </v-btn>
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
                              v-model="fab"
                              direction="left"
                              :open-on-hover="hover"
                              transition="slide-x-reverse-transition"
                              >
                              <v-btn slot="activator" v-model="fab" small color="blue darken-2" dark fab>
                                <v-icon>mdi-information-variant</v-icon>
                                <v-icon>close</v-icon>
                              </v-btn>
                              <v-btn v-on:click="modalModEdt = true; selecItem(mod)" fab dark small color="green">
                                <v-icon>edit</v-icon>
                              </v-btn>
                              <v-btn fab dark small color="indigo">
                                <v-icon>add</v-icon>
                              </v-btn>
                              <v-btn v-on:click="modDel(mod)" fab dark small color="red" >
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
                  <div class="box">
                    <article class="media">
                      <div class="media-content">
                        <div class="content">
                          <p>{{ _os.notas.descricao}}</p>
                        </div>
                        <nav class="level is-mobile">
                          <div class="level-left">
                            <a v-if="_os.notas" v-on:click="modalNotaEdt = true" class="level-item">
                              <span class="mdi mdi-note-text"></span> Editar
                            </a>
                          </div>
                        </nav>
                      </div>
                    </article>
                  </div>
                </div>
              </v-flex>
            </v-layout>
          </v-container>
        </v-flex>
      </div>
    
        
        <div>
          <desloc-add v-if="modalDeslocAdd" v-on:close="modalDeslocAdd = false" :data="_os"></desloc-add>
          <desloc-edt v-if="modalDeslocChg" v-on:close="modalDeslocChg = false" :data="modalItem"></desloc-edt>
          <desloc-chg v-if="modalDeslocEdt" v-on:close="modalDeslocEdt = false" :data="modalItem"></desloc-chg>
          <mod-add v-if="modAdd" v-on:close="modAdd = false" :data="modalItem"></mod-add>
          <mod-edt v-if="modEdt" v-on:close="modEdt = false" :data="modalItem"></mod-edt>
          <nota-add v-if="modalNotaAdd" v-on:close="modalNotaAdd = false" :data="_os"></nota-add>
          <nota-edt v-if="modalNotaEdt" v-on:close="modalNotaEdt = false" :data="_os"></nota-edt>
        </div>

      </v-container>
    </v-content>
  </div>
</template>
<script src="src/components/os/os.js"></script>

<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>
<?php require_once 'src/components/servicos/nota/nota-add.php';?>
<?php require_once 'src/components/servicos/nota/nota-edt.php';?>
<?php require_once 'src/components/servicos/tecnico/deslocamento/desloc-add.php';?>
<?php require_once 'src/components/servicos/tecnico/deslocamento/desloc-chg.php';?>
<?php require_once 'src/components/servicos/tecnico/deslocamento/desloc-edt.php';?>
<?php require_once 'src/components/servicos/tecnico/mod/mod-add.php';?>
<?php require_once 'src/components/servicos/tecnico/mod/mod-edt.php';?>
<?php require_once 'src/components/servicos/tecnico/tecnico.php';?>

<?php require_once 'src/components/os/_progresso.php';?>