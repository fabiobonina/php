
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
              <h1 class="title is-5"> {{oss.lojaNick}} | {{oss.local.tipo}} - {{oss.local.name}} ({{oss.local.municipio}}/{{oss.local.uf}}) </h1>
              <p class="subtitle" style="margin-bottom: 0;"> {{oss.data}} | {{oss.servico.name}}
                <span class="pull-right"> <span class="tag">{{ oss.categoria }}</span> &nbsp;  </span>
              </p>
              <p v-if="oss.bem">{{oss.bem.name}} {{oss.bem.modelo}}  &nbsp; <a>#{{oss.bem.fabricanteNick}} </a> 
              <p v-for="tecnico in oss.tecnicos"> <a><span class="icon mdi mdi-worker"></span> {{tecnico.user}} &nbsp;</a> </p>
            </div>
            <div class="column">
              <nav class="level">
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">OS <span class="icon mdi mdi-wrench"></span></p>
                    <p class="title">  {{oss.filial}}| {{oss.os}} </p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Ativo <span class="title is-6 mdi mdi-barcode"></span></p>
                    <p v-if="oss.bem" class="title">{{ oss.bem.plaqueta }}</p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                  <p class="heading">Mapa </p>
                    <a v-if=" 0.000000 != oss.local.latitude"
                      :href="'https://maps.google.com/maps?q='+ oss.local.latitude + ',' + oss.local.longitude"
                    target="_blank">
                      <span class="title is-2 mdi mdi-google-maps"></span>
                    </a>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>

        <div>
          <ul class="steps is-small">
            <li :class="oss.processo > 0 ?
                          'step-item is-completed is-info' : 'step-item'">
              <div class="step-marker">
                <span class="mdi mdi-arrow-right-bold"></span>
              </div>
              <div class="step-details is-primary is-completed">
                <p class="step-title">Em Transito</p>
              </div>
            </li>
            <li :class="oss.processo >= 1 ?
                          oss.processo == 1 || oss.processo == 3 ? 'step-item is-completed is-success' :
                          oss.processo == 2  ? 'step-item is-completed is-warning' : 'step-item is-completed is-info' 
                        : 'step-item'">
              <div class="step-marker">
                <span class="icon mdi mdi-wrench"></span>
              </div>
              <div class="step-details">
                <p class="step-title">Atendendo</p>
              </div>
            </li>
            <li :class="oss.processo >= 4 ?
                          oss.processo == 4 || oss.processo == 6 ? 'step-item is-completed is-success' :
                          oss.processo == 5  ? 'step-item is-completed is-warning' : 'step-item is-completed is-info' 
                        : 'step-item'">
              <div class="step-marker">
                <span class="mdi mdi-redo-variant"></span>
              </div>
              <div class="step-details">
                <p class="step-title">Retorno</p>
              </div>
            </li>
            <li :class="oss.processo >= 7 ?
                          oss.processo == 7 || oss.processo == 9 ? 'step-item is-completed is-success' :
                          oss.processo == 8  ? 'step-item is-completed is-warning' : 'step-item is-completed is-info' 
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
          <a v-on:click="modalDeslocAdd = true" class="button is-link is-al">
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
      <div>
        <section class="container">
          <div>
            <br>
            <!--grid-local
                :data="locais"
                :columns="gridColumns"
                :filter-key="searchQuery">
            </grid-local-->
            <div v-for="tecnico in oss.tecnicos">
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
        <desloc-add v-if="modalDeslocAdd" v-on:close="modalDeslocAdd = false" :data="oss"></desloc-add>
        <desloc-edt v-if="modalDeslocChg" v-on:close="modalDeslocChg = false" :data="modalItem"></desloc-edt>
        <desloc-chg v-if="modalDeslocEdt" v-on:close="modalDeslocEdt = false" :data="modalItem"></desloc-chg>
        <descricao-add v-if="modalDescAdd" v-on:close="modalDescAdd = false" :data="loja"></descricao-add>
      </div>
      <!-- /.box -->
    </section>
  </div>
</template>