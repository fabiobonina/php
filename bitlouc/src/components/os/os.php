
<template id="os">
  <div>
  <top></top>
  <v-content>
            <template>
              <v-card color="cyan" flat height="200px" tile>
                <v-toolbar color="cyan" prominent class="white--text">
                <v-btn @click="$router.go(-1)" icon >
                    <v-icon class="white--text">arrow_back</v-icon>
                  </v-btn>
                  <div>
                    <div class="headline">{{_os.lojaNick}} | {{_os.local.tipo}} - {{_os.local.name}} ({{_os.local.municipio}}/{{_os.local.uf}})</div>
                    <div>{{_os.data}} | {{_os.servico.name}} - {{ _os.categoria.name }}</div>
                    <div v-if="_os.bem">{{_os.bem.name}} {{_os.bem.modelo}} (CODE: {{_os.bem.numeracao}} | Ativo: {{_os.bem.plaqueta}} )  &nbsp; <a>#{{_os.bem.fabricanteNick}} </a> </div>
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
                  <div class="text-xs-center">
                    <v-badge left>
                      <v-icon slot="badge" dark small>location_city</v-icon>
                      <span>Local: {{ loja.locaisQt }}</span>
                    </v-badge>
                    &nbsp;&nbsp;
                    <v-badge color="green">
                      <v-icon slot="badge" dark small>place</v-icon>
                      <span>{{ loja.locaisGeoStatus }}% ({{ loja.locaisGeoQt }})</span>
                    </v-badge>
                    &nbsp;
                  </div>
                  <v-btn icon>
                    <v-icon>search</v-icon>
                  </v-btn>

                  <v-btn icon>
                    <v-icon>favorite</v-icon>
                  </v-btn>

                  <v-btn icon>
                    <v-icon>more_vert</v-icon>
                  </v-btn>
                </v-toolbar>
                <div>
                      
                </div>
              </v-card>
            </template>
          <v-container fluid>
      <!-- Hero head: will stick at the top -->
      
      <!-- Hero content: will be in the middle -->
      <div>
        <div>
          <div>
            <div>
              <h1 class="title is-5"> </h1>
              <p class="subtitle" style="margin-bottom: 0;"> 
                <span class="pull-right"> <span class="tag"></span> &nbsp;  </span>
              </p>
               
              <p><span class="icon mdi mdi-worker"></span>  <a v-for="tecnico in _os.tecnicos">{{tecnico.userNick}} |</a> </p>
            </div>
            <div>
              <nav class="level">
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">OS <span class="icon mdi mdi-wrench"></span></p>
                    <p class="title">  {{_os.filial}}| {{_os.os}} </p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Ativo <span class="title is-6 mdi mdi-barcode"></span></p>
                    <p v-if="_os.bem" class="title">{{ _os.bem.plaqueta }}</p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                  <p class="heading">ROTA</p>
                    <a v-if=" 0.000000 != _os.local.latitude"
                      :href="'https://maps.google.com/maps?q='+ _os.local.latitude + ',' + _os.local.longitude"
                      target="_blank">
                      <span class="title is-3 mdi mdi-directions"></span>
                    </a>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
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
      <div class="hero-foot">
        <nav class="tabs">
          <div class="container">
            <ul>
              <li class="is-active">
                <a @click="$router.go(-1)" class="btn btn-default"><span class=" title is-5 mdi mdi-arrow-left"></span></a>
              </li>
              <li :class="$route.path == '/loja/'+ $route.params._id ? 'is-active' : ''">
                <a :href="'#/loja/'+ _os.loja +'/local/'+ _os.local.id "> Local</a>
              </li>
              <li :class="$route.path == '/loja/'+ $route.params._id +'/lojaos' ? 'is-active' : ''">
                <a :href="'#/loja/'+ $route.params._id +'/lojaos'"> OS´s</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </section>

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
    <nav class="breadcrumb is-right" aria-label="breadcrumbs">
      <ul>
        <li><router-link to="/"> Home</router-link></li>
        <li><router-link :to="'/loja/' + $route.params._id"> Loja</router-link></li>
        <li class="is-active"><a aria-current="page">Local</a></li>
      </ul>
    </nav>
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