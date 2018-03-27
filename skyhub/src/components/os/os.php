
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
                <span class="pull-right"> <span class="tag">{{ _os.categoria }}</span> &nbsp;  </span>
              </p>
              <p v-if="_os.bem">{{_os.bem.name}} {{_os.bem.modelo}}  &nbsp; <a>#{{_os.bem.fabricanteNick}} </a> 
              <p v-for="tecnico in _os.tecnicos"> <a><span class="icon mdi mdi-worker"></span> {{tecnico.user}} &nbsp;</a> </p>
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
              <div class="step-marker">
                <span class="mdi mdi-arrow-right-bold"></span>
              </div>
              <div class="step-details is-primary is-completed">
                <p class="step-title">Em Transito</p>
              </div>
            </li>
            <li :class="_os.processo >= 1 ?
                          _os.processo == 1 || _os.processo == 3 ? 'step-item is-completed is-success' :
                          _os.processo == 2  ? 'step-item is-completed is-warning' : 'step-item is-completed is-info' 
                        : 'step-item'">
              <div class="step-marker">
                <span class="icon mdi mdi-wrench"></span>
              </div>
              <div class="step-details">
                <p class="step-title">Atendendo</p>
              </div>
            </li>
            <li :class="_os.processo >= 4 ?
                          _os.processo == 4 || _os.processo == 6 ? 'step-item is-completed is-success' :
                          _os.processo == 5  ? 'step-item is-completed is-warning' : 'step-item is-completed is-info' 
                        : 'step-item'">
              <div class="step-marker">
                <span class="mdi mdi-redo-variant"></span>
              </div>
              <div class="step-details">
                <p class="step-title">Retorno</p>
              </div>
            </li>
            <li :class="_os.processo >= 7 ?
                          _os.processo == 7 || _os.processo == 9 ? 'step-item is-completed is-success' :
                          _os.processo == 8  ? 'step-item is-completed is-warning' : 'step-item is-completed is-info' 
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
        <div class="control">
          <a v-on:click="modalDeslocAdd = true" class="button is-link is-al">
            <span class="mdi mdi-walk"></span> Desloc.
          </a>
        </div>
        &nbsp;
        <div class="control">
          <a v-on:click="modalNotaAdd = true" class="button is-link is-al">
            <span class="mdi mdi-note-text"></span> Nota
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
                <p> <a>@{{tecnico.user}} &nbsp;</a><p>
                  <p v-for="mod in tecnico.mods">
                  <span class="mdi mdi-calendar"></span>
                  <th>{{ mod.dtInicio }} </th><span class="mdi mdi-ray-start-arrow"></span>
                  <td>{{ mod.dtFinal }}</td>
                  <span class="mdi mdi-clock"></span>
                  <td>{{ mod.tempo }}</td>
                  <span class="mdi mdi-road-variant"></span>
                  <td>{{ mod.kmInicio }}</td><span class="mdi mdi-ray-start-arrow"></span>
                  <td>{{ mod.kmFinal }}</td>
                  <span class="mdi mdi-cash-usd"></span>
                  <td>{{ mod.valor }}</td>
                  <a v-on:click="modalModEdt = true; selecItem(mod)" class="button is-link is-small is-al"><span class="mdi mdi-transit-transfer"></span></a>
                  </p>
                  
                </div>
              </div>
              <div class="column">
                <p v-for="nota in _os.notas">{{ nota.descricao}}</p>
              </div>

            </div>
      <div>
        <section class="container">
          <div>
            <br>
            <!--grid-local
                :data="locais"
                :columns="gridColumns"
                :filter-key="searchQuery">
            </grid-local-->
            <div v-for="tecnico in _os.tecnicos">
            <p> <a>@{{tecnico.user}} &nbsp;</a><p>
            <div>
            <a v-on:click="modalDeslocAdd = true" class="button is-link is-al">
              <span class="mdi mdi-walk"></span> Desloc.
            </a>
            </div>
           
            <table class="table">
              <thead>
                <tr>
                  <th>DataInicio</th>
                  <th>DataFinal</th>
                  <th>Tempo</th>
                  <th>KmInicio</th>
                  <th>KmFinal</th>
                  <th>Valor</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="mod in tecnico.mods">
                  <th>{{ mod.dtInicio }} </th>
                  <td>{{ mod.dtFinal }}</td>
                  <td>{{ mod.tempo }}</td>
                  <td>{{ mod.kmInicio }}</td>
                  <td>{{ mod.kmFinal }}</td>
                  <td>{{ mod.valor }}</td>
                  <td>
                    <a v-on:click="modalDeslocAdd = true; selecItem(mod)" class="button is-primary is-al">Editar</a>
                    <a v-on:click="modalDeslocAdd = true; selecItem(mod)" class="button is-primary is-al">Chegada</a>
                  </td>
                </tr>
              </tbody>
            </table>
            
          </div>
          </div>
        </section>
        <desloc-add v-if="modalDeslocAdd" v-on:close="modalDeslocAdd = false" :data="_os"></desloc-add>
        <desloc-edt v-if="modalDeslocChg" v-on:close="modalDeslocChg = false" :data="modalItem"></desloc-edt>
        <desloc-chg v-if="modalDeslocEdt" v-on:close="modalDeslocEdt = false" :data="modalItem"></desloc-chg>
        <mod-edt v-if="modalModEdt" v-on:close="modalModEdt = false" :data="modalItem"></mod-edt>
        <nota-add v-if="modalNotaAdd" v-on:close="modalNotaAdd = false" :data="_os"></nota-add>
      </div>
      <!-- /.box -->
    </section>
  </div>
</template>