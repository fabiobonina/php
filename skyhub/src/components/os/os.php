
<template id="os">
  <div>
    <section class="hero is-link">
      <!-- Hero head: will stick at the top -->
      <top></top>
      <!-- Hero content: will be in the middle -->
      <div class="hero-body">
        <div class="container has-text-centered">
          <div class="columns">
            <div class="column is-two-thirds has-text-left">
              <h1 class="title is-5"> {{_os.lojaNick}} | {{_os.local.tipo}} - {{_os.local.name}} ({{_os.local.municipio}}/{{_os.local.uf}}) </h1>
              <p class="subtitle" style="margin-bottom: 0;"> {{_os.data}} | {{_os.servico.name}}
                <span class="pull-right"> <span class="tag">{{ _os.categoria.name }}</span> &nbsp;  </span>
              </p>
              <p v-if="_os.bem">{{_os.bem.name}} {{_os.bem.modelo}}  &nbsp; <a>#{{_os.bem.fabricanteNick}} </a> 
              <p v-for="tecnico in _os.tecnicos"> <a><span class="icon mdi mdi-worker"></span> {{tecnico.userNick}} &nbsp;</a> </p>
            </div>
            <div class="column">
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

        <div>
          <ul class="steps is-small">
            <li :class="_os.processo > 0 ?
                          'step-item is-completed is-info' : 'step-item'">
              <div class="step-marker"><span class="mdi mdi-arrow-right-bold"></span></div>
              <div class="step-details is-primary is-completed">
                <p class="step-title">Em Transito</p>
              </div>
            </li>
            <li :class="_os.processo >= 1 ?
                          _os.processo == 1 ? 'step-item is-completed is-success' :
                          _os.processo == 2  ? 'step-item is-completed is-warning' : 'step-item is-completed is-info' 
                        : 'step-item'">
              <div class="step-marker">
                <span class="icon mdi mdi-wrench"></span>
              </div>
              <div class="step-details">
                <p class="step-title">Atendendo</p>
              </div>
            </li>
            <li :class="_os.processo >= 3 ?
                          _os.processo == 3 ? 'step-item is-completed is-success' :
                          _os.processo == 4  ? 'step-item is-completed is-warning' : 'step-item is-completed is-info' 
                        : 'step-item'">
              <div class="step-marker">
                <span class="mdi mdi-redo-variant"></span>
              </div>
              <div class="step-details">
                <p class="step-title">Retorno</p>
              </div>
            </li>
            <li :class="_os.processo >= 5 ?
                          _os.processo == 5 ? 'step-item is-completed is-success' :
                          _os.processo == 6  ? 'step-item is-completed is-warning' : 'step-item is-completed is-info' 
                        : 'step-item'">
              <div class="step-marker">
                <span class="icon mdi mdi-check"></span>
              </div>
              <div class="step-details">
                <p class="step-title">Completo</p>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <!-- Hero footer: will stick at the bottom -->
      <div class="hero-foot">
        <nav class="tabs">
          <div class="container">
            <ul>
              <li :class="$route.path == '/loja/'+ $route.params._id ? 'is-active' : ''">
                <a><router-link :to="'/loja/'+ $route.params._id"> Bens</router-link></a>
              </li>
              <li :class="$route.path == '/loja/'+ $route.params._id +'/lojaos' ? 'is-active' : ''">
                <a><router-link :to="'/loja/'+ $route.params._id +'/lojaos'"> OS´s</router-link></a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </section>
    <div>
      <router-view></router-view>
    </div>
    <br>
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
          <a v-if="_os.notas && _os.processo >= 4 && _os.status == 1" v-on:click="osConcluir()" class="button is-info is-al">
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
        <mod-edt v-if="modalModEdt" v-on:close="modalModEdt = false" :data="modalItem"></mod-edt>
        <nota-add v-if="modalNotaAdd" v-on:close="modalNotaAdd = false" :data="_os"></nota-add>
        <nota-edt v-if="modalNotaEdt" v-on:close="modalNotaEdt = false" :data="_os"></nota-edt>
      </div>
      <!-- /.box -->
    </section>
  </div>
</template>