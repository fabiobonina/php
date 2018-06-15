
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
            <v-slider :tick-labels="labels" v-model="_os.processo" thumb-color="green" :max="4" :disabled="_os.processo === '0'" always-dirty></v-slider>
          </v-card-text>
        </div>
      </v-card>
    </template>
  <v-container fluid>
      <!-- Hero head: will stick at the top -->
      
      <!-- Hero content: will be in the middle -->
      <div>
        <div class="buttons has-addons is-centered is-toggle is-fullwidth" style="width: 100%;">
          <a :class="_os.processo >= 1 ?
              _os.processo == 1 ? 'button is-success is-selected' : 'button is-info is-selected is-small'   
              : 'button is-light is-selected is-small' " style="width: 20%;">
            <span :class="_os.processo == 1 ? 'mdi mdi-loading mdi-spin' : 'mdi mdi-arrow-right-bold' "></span>
            <span>Em trasito</span>
            <span class="title is-4 has-text-white mdi mdi-chevron-right"></span>
          </a>
          <span :class="_os.processo >= 2 ?
              _os.processo == 2 ? 'button is-success is-selected' : 'button is-info is-selected is-small'   
              : 'button is-light is-selected is-small' " style="width: 20%;">
            <span :class="_os.processo == 2 ? 'mdi mdi-loading mdi-spin' : 'mdi mdi-wrench' "></span>
            <span>Atendendo</span>
            <span class="title is-4 has-text-white mdi mdi-chevron-right"></span>
          </span>
          <span :class="_os.processo >= 3 ?
              _os.processo == 3 ? 'button is-success is-selected' : 'button is-info is-selected is-small'   
              : 'button is-light is-selected is-small' " style="width: 20%;">
            <span :class="_os.processo == 3 ? 'mdi mdi-loading mdi-spin' : 'mdi mdi-redo-variant' "></span>
            <span>Retorno Viagem</span>
            <span class="title is-4 has-text-white mdi mdi-chevron-right"></span>
          </span>
          <span :class="_os.processo >= 4 ?
              _os.processo == 4 ? 'button is-success is-selected' : 'button is-info is-selected is-small'   
              : 'button is-light is-selected is-small' " style="width: 20%;">
            <span :class="_os.processo == 4 ? 'mdi mdi-loading mdi-spin' : 'mdi mdi-check' "></span>
            <span>Completo</span>
            <span class="title is-4 has-text-white mdi mdi-chevron-right"></span>
          </span>
        </div>
      </div>
      <!-- Hero footer: will stick at the bottom -->
    </section>
    <v-container fluid>
      <v-layout row wrap align-center >
        <v-flex xs12 sm3>
          <v-btn block :small="_os.processo != 1" b :class="_os.processo >= 1 ?
              _os.processo == 1 ? 'green accent-4 white--text' : 'blue white--text small'   
              : 'light white--text small' ">
            <v-icon :small="_os.processo != 1" :class="_os.processo == 1 ? 'mdi mdi-loading mdi-spin' : 'mdi mdi-arrow-right-bold' "></v-icon>
            Em trasito
            <v-icon class="title is-4 has-text-white mdi mdi-chevron-right"></v-icon>
          </v-btn>
        </v-flex>
        <v-flex xs12 sm3>
          <v-btn block :small="_os.processo != 2" b :class="_os.processo >= 2 ?
              _os.processo == 2 ? 'green accent-4 white--text' : 'small blue white--text'   
              : 'small light' ">
            <v-icon :small="_os.processo != 2" :class="_os.processo == 2 ? 'mdi mdi-loading mdi-spin' : 'mdi mdi-wrench' "></v-icon>
            Atendimento
            <v-icon class="mdi mdi-chevron-right"></v-icon>
          </v-btn>
        </v-flex>
        <v-flex xs12 sm3>
          <v-btn block :small="_os.processo != 3" b :class="_os.processo >= 3 ?
              _os.processo == 3 ? 'green accent-4 white--text' : 'small blue white--text'   
              : 'small light' ">
            <v-icon :small="_os.processo != 3" :class="_os.processo == 3 ? 'mdi mdi-loading mdi-spin' : 'mdi mdi-redo-variant' "></v-icon>
            Retorno Viagem
            <v-icon class="mdi mdi-chevron-right"></v-icon>
          </v-btn>
        </v-flex>
        <v-flex xs12 sm3>
          <v-btn block :small="_os.processo != 4" b :class="_os.processo >= 4 ?
              _os.processo == 4 ? 'green accent-4 white--text' : 'small blue white--text'   
              : 'small light' ">
            <v-icon :small="_os.processo != 4" :class="_os.processo == 4 ? 'mdi mdi-loading mdi-spin' : 'mdi mdi-redo-variant' "></v-icon>
            Completo
            <v-icon class="mdi mdi-chevron-right"></v-icon>
          </v-btn>
        </v-flex>
      </v-layout>
    </v-container>

    <section class="container">
      <div class="field has-addons">
        <div class="control">
          <input v-model="search" class="input" type="text" placeholder="Search">
        </div>
        <div class="control">
          <a class="button is-info"><span class="mdi mdi-magnify"></span></a>
        </div>
        &nbsp;
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
      </div>
    </section>

    <section class="container">

       <div class="columns">
          <div class="column">
            <div v-for="tecnico in _os.tecnicos">
              <p class="panel-heading is-small" >
                <a>@{{tecnico.userNick}} &nbsp;</a>
                <a v-on:click="modalModAdd = true; selecItem(tecnico)" class="button is-link is-small is-al">
                  <span class="mdi mdi-transit-transfer">Add</span>
                </a>
              </p>
              
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
      <!-- /.box -->

      </v-container>
    </v-content>
    <rodape></rodape>
    <section>
    </section>
  </div>
</template>
<script src="src/components/os/os.js"></script>

<?php require_once 'src/components/includes/top.php';?>
<?php require_once 'src/components/includes/rodape.php';?>