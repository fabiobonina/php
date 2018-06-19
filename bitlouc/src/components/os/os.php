
<template id="os">
  <div>
  <top></top>
  <v-content>
    <template>
      <v-card flat height="200px" tile>
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
            <v-avatar>
              <v-icon class="icon mdi mdi-wrench"></v-icon>
            </v-avatar>
            OS: {{_os.filial}} - {{_os.os}}
          </v-chip>

          <v-btn :disabled=" 0.000000 == _os.local.latitude" :href="'https://maps.google.com/maps?q='+ _os.local.latitude + ',' + _os.local.longitude" target="_blank" icon  color="primary">
            <v-icon dark>directions</v-icon>
          </v-btn>

          <v-btn icon>
            <v-icon>favorite</v-icon>
          </v-btn>

          <v-btn icon>
            <v-icon>more_vert</v-icon>
          </v-btn>
        </v-toolbar>
        <div>
          <v-card-text>
            <progresso-os :data="_os.processo"></progresso-os>
          </v-card-text>
        </div>
      </v-card>
    </template>
    <v-container fluid>
    <div v-if="user.nivel > 1 && user.grupo == 'P'" class="control">
          <a v-if="_os.status <= 1 " v-on:click="modalDeslocAdd = true" class="button is-link is-al">
            <span class="mdi mdi-walk"></span> Desloc.
          </a>
          <a v-if="!_os.notas" v-on:click="modalNotaAdd = true" class="button is-link is-al">
            <span class="mdi mdi-note-text"></span> Nota
          </a>
          <a v-if="_os.notas && _os.processo >= 2 && _os.status == 1" v-on:click="osConcluir()" class="button is-info is-al">
            <span class="mdi mdi-check"></span> Concluir OS
          </a>
        </div>
        &nbsp;
        <div v-if="user.nivel > 2 && user.grupo == 'P'" class="control">
          <a v-if="_os.status == 2" v-on:click="osReabrir()" class="button is-warning is-al">
            <span class="mdi mdi-reply"></span> Reabrir OS
          </a>
          <a v-if="_os.status == 2"  v-on:click="osFechar()" class="button is-info is-al">
            <span class="mdi mdi-check"></span> Fechar OS
          </a>
          <a v-if="user.nivel > 3 && _os.status == 3"  v-on:click="osValidar()" class="button is-primary is-al">
            <span class="mdi mdi-check"></span> Validar OS
          </a>
        </div>
      <div>
      <v-flex xs12>
            <v-container grid-list-xl>
        <v-layout row wrap>
          <v-flex xs12 md8>
            <div>
            <div>
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
                <v-btn  @click="modalAdd=true" color="pink" dark small absolute fab right>
                  <v-icon>add</v-icon>
                </v-btn>
              </v-toolbar>
                <v-list>
                  <v-list-group
                    v-for="item in tecnico.mods"
                    :key="item.id"
                    prepend-icon="mdi-calendar"
                    no-action
                  >
                    <v-list-tile slot="activator">
                    <v-list-tile-action>
                      {{ item.status.tipo }}
                    </v-list-tile-action>
                    <v-list-tile-content dense>
                      <v-list-tile-title> {{item.dtInicio}} </v-list-tile-title>
                      <v-list-tile-title>  {{item.dtFinal}} </v-list-tile-title>
                    </v-list-tile-content>
                    <v-list-tile-content>
                      <v-list-tile-title> {{ item.tempo }}h </v-list-tile-title>
                      <v-list-tile-title> {{ item.hhValor }}hh </v-list-tile-title>
                    </v-list-tile-content>
                    <v-list-tile-content>
                    <v-list-tile-title>{{ item.kmInicio }}Km</v-list-tile-title>
                    <v-list-tile-title>{{ item.kmFinal }}Km</v-list-tile-title>
                    </v-list-tile-content>
                    <v-list-tile-content>
                    <v-list-tile-title> {{ item.kmFinal - item.kmInicio }}km </v-list-tile-title>
                    <v-list-tile-title>{{ item.valor }} <span class="mdi mdi-cash-usd"></span></v-list-tile-title>
                    </v-list-tile-content>

                    </v-list-tile>

                    <v-list-tile @click="">

                      <div class="text-xs-center">
                        <v-btn fab dark small color="primary">
                          <v-icon dark>remove</v-icon>
                        </v-btn>

                        <v-btn fab dark small color="pink">
                          <v-icon dark>favorite</v-icon>
                        </v-btn>

                        
                      </div>
                      <v-btn v-on:click="modalModEdt = true; selecItem(mod)" small fab dark color="primary">
                        <v-icon dark>mdi-transit-transfer</v-icon>
                      </v-btn>
                      <v-btn v-on:click="modDel = true; selecItem(mod)" small fab dark color="error">
                        <v-icon dark>mdi-transit-transfer</v-icon>
                      </v-btn>
                      <v-list-tile-action>
                        <v-icon></v-icon>
                      </v-list-tile-action>
                    </v-list-tile>
                  </v-list-group>
                </v-list>
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
                      <v-list-tile-title> {{ item.tempo }}h </v-list-tile-title>
                      <v-list-tile-title> {{ item.hhValor }}hh </v-list-tile-title>
                    </v-list-tile-content>
                    <v-list-tile-content>
                    <v-list-tile-title>{{ item.kmInicio }}Km</v-list-tile-title>
                    <v-list-tile-title>{{ item.kmFinal }}Km</v-list-tile-title>
                    </v-list-tile-content>
                    <v-list-tile-content>
                    <v-list-tile-title> {{ item.kmFinal - item.kmInicio }}km </v-list-tile-title>
                    <v-list-tile-title>{{ item.valor }} <span class="mdi mdi-cash-usd"></span></v-list-tile-title>
                    </v-list-tile-content>
                  <a  class="button is-link is-small is-al">
                    <span class="mdi mdi-transit-transfer"></span>
                  </a>
                  <a v-on:click="modDel(mod)" class="delete"></a>
                  <v-list-tile-action>
                    <v-btn v-on:click="modalModEdt = true; selecItem(mod)" small fab dark color="primary">
                      <v-icon dark>mdi-transit-transfer</v-icon>
                    </v-btn>
                  </v-list-tile-action>
                  <v-list-tile-action>
                      <v-menu v-if="user.nivel > 2 && user.grupo == 'P'" open-on-hover top offset-y left  @click="">
                        <v-btn slot="activator" icon>
                          <v-icon>more_vert</v-icon>
                        </v-btn>
                        <v-list>
                          <v-list-tile @click="modalGeo = true; selecItem(item)">
                            <v-list-tile-title>
                              <v-icon>location_on</v-icon>Geoposição
                            </v-list-tile-title>
                          </v-list-tile>
                          <v-list-tile @click="modalCat = true; selecItem(item)">
                            <v-list-tile-title>
                              <v-icon>label</v-icon></span>Categoria
                            </v-list-tile-title>
                          </v-list-tile>
                          <v-list-tile @click="modalEdt = true; selecItem(item)">
                            <v-list-tile-title>
                              <v-icon>create</v-icon>Editar
                            </v-list-tile-title>
                          </v-list-tile>
                          <v-list-tile v-if="user.nivel > 3" @click="modalDel = true; selecItem(item)">
                            <v-list-tile-title>
                              <v-icon>delete</v-icon>Delete
                            </v-list-tile-title>
                          </v-list-tile>
                        </v-list>
                      </v-menu>
                          <v-speed-dial
                            v-model="fab"
                            bottom="bottom"
                            direction="left"
                            :open-on-hover="hover"
                            transition="slide-x-reverse-transition"
                          >
                            <v-btn slot="activator" v-model="fab" color="blue darken-2" dark fab>
                              <v-icon>account_circle</v-icon>
                              <v-icon>close</v-icon>
                            </v-btn>
                            <v-btn fab dark small color="green">
                              <v-icon>edit</v-icon>
                            </v-btn>
                            <v-btn fab dark small color="indigo">
                              <v-icon>add</v-icon>
                            </v-btn>
                            <v-btn fab dark small color="red" >
                              <v-icon>delete</v-icon>
                            </v-btn>
                          </v-speed-dial>
                    </v-list-tile-action>
                  </v-list-tile>
                  <v-divider v-if="index + 1 < tecnico.mods.length" :key="index"></v-divider>
                </template>
              </v-list>
            </v-card>
              
              <div v-for="mod in tecnico.mods">
                <p class="panel-block">
                  {{ mod.status.tipo }}
                  <span class="mdi mdi-calendar"></span>
                  <strong>
                    <a> {{ mod.dtInicio }} </a><br>
                    <a> {{ mod.dtFinal }} </a>
                  </strong> 
                  <span class="mdi mdi-clock"></span>&nbsp; 
                  <strong>
                    <a> {{ mod.tempo }}h </a><br>
                    <a> {{ mod.hhValor }}hh </a>
                  </strong>&nbsp;|
                  <span class="mdi mdi-road-variant"></span>&nbsp;
                  <strong>
                    <a>{{ mod.kmInicio }}</a><br>
                    <a>{{ mod.kmFinal }}</a>
                  </strong>
                  <span class="mdi mdi-ray-start-arrow"></span>&nbsp;
                  <strong>
                    <a> {{ mod.kmFinal - mod.kmInicio }}km </a><br>
                    <a>{{ mod.valor }}</a><span class="mdi mdi-cash-usd"></span>&nbsp;
                  </strong>&nbsp;
                  <a v-on:click="modalModEdt = true; selecItem(mod)" class="button is-link is-small is-al">
                    <span class="mdi mdi-transit-transfer"></span>
                  </a>
                  <a v-on:click="modDel(mod)" class="delete"></a>
                </p>    
              </div>
            </div>    
          </div>

            </div>
          </v-flex>

          <v-flex xs12 md4>
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
          <mod-add v-if="modalModAdd" v-on:close="modalModAdd = false" :data="modalItem"></mod-add>
          <mod-edt v-if="modalModEdt" v-on:close="modalModEdt = false" :data="modalItem"></mod-edt>
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

<?php require_once 'src/components/os/_progresso.php';?>