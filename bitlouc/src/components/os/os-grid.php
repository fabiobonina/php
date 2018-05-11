<template id="os-grid">
  <div>
    <!-- #/SELEÇÃO DE CATEGORIA -->
    <section class="container">      
      <div class="box content">
        <div class="field has-addons">
          <div class="control">
            <input v-model="configs.search" class="input" type="text" placeholder="Search">
          </div>
          <div class="control">
            <a class="button is-info"><span class="mdi mdi-magnify"></span></a>
          </div>
          &nbsp;
          <div class="control">
            <a @click="configs.order == 'asc'? configs.order = 'desc': configs.order = 'asc'" class="button is-info">
              <span :class="configs.order == 'asc'? 'mdi mdi-sort-ascending': 'mdi-sort-descending'"class="mdi mdi-magnify"></span>
            </a>
          </div>
          &nbsp;
          <div class="control">
            <div class="field is-horizontal">
              <div class="field-body">
                <p class="control"><a class="button is-static">Ordernar por:</a></p>
                <span class="select">
                  <select v-model="configs.orderBy">
                    <option value="data">Data</option>
                    <option value="local.name">Local</option>
                    <option value="loja">Loja</option>
                  </select>
                </span>
              </div>
            </div>
          </div>
        </div>
        <article class="post" v-for="entry in filteredData">
          <div class="columns">
            <div class="column is-6 has-text-left">
              <h1 class="title is-6">
                <a :href="'#/oss/' + entry.loja + '/os/' + entry.id" style="margin-bottom: 0;">
                  {{entry.lojaNick}} | {{entry.local.tipo}} - {{entry.local.name}} ({{entry.local.municipio}}/{{entry.local.uf}}) 
                </a>
              </h1>
              <p class="subtitle is-6" style="margin-bottom: 0;"> {{entry.data}} | {{entry.servico.name}}
                <span class="pull-right"> <span class="tag">{{ entry.categoria.name }}</span> &nbsp;  </span>
              </p>
              <p v-if="entry.bem" style="margin-bottom: 0;">{{entry.bem.name}} {{entry.bem.modelo}}  &nbsp; <a>#{{entry.bem.fabricanteNick}} </a> 
              <p> <span class="icon mdi mdi-worker"></span> <a v-for="tecnico in entry.tecnicos"> {{tecnico.userNick}} |</a> </p>
            </div>
            <div class="column is-6">
              <nav class="level">
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">OS<span class="icon is-small"><i class="fa fa-wrench"></i></span></p>
                    <p class="title is-4"> {{entry.filial}} | {{entry.os}} </p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Ativo <i class="fa fa-barcode"></i></p>
                    <p class="title is-4" v-if="entry.bem">{{ entry.bem.plaqueta }}</p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Rota</p>
                    <a v-if=" 0.000000 != entry.local.latitude"
                    :href="'https://maps.google.com/maps?q='+ entry.local.latitude + ',' + entry.local.longitude"
                    target="_blank">
                      <span class="title is-3 has-text-info mdi mdi-directions"></span>
                    </a>
                  </div>
                </div>
                <div v-if="user.nivel > 2 && user.grupo == 'P'" class="level-item has-text-centered">
                  <div>
                    <p class="heading">Ação</p>
                    <div class="dropdown is-right is-hoverable">
                      <div class="dropdown-trigger">
                        <a aria-haspopup="true" aria-controls="dropdown-menu1">
                          <span class="title is-3 mdi mdi-apps"></span>
                        </a>
                      </div>
                      <div class="dropdown-menu" id="dropdown-menu1" role="menu">
                        <div class="dropdown-content">
                          <a @click="modalOs = true; selecItem(entry)" class="dropdown-item">
                            <span class="mdi mdi-wrench"></span>Amarrar OS
                          </a>
                          <a @click="modalTec = true; selecItem(entry)" class="dropdown-item">
                            <span class="mdi mdi-worker"></span>Tecnicos
                          </a>
                          <a @click="modalEdt = true; selecItem(entry)" class="dropdown-item">
                            <span class="mdi mdi-pencil"></span>Editar
                          </a>
                          <a v-if="entry.status == '0' && entry.processo == '0'" @click="modalDel = true; selecItem(entry)" class="dropdown-item">
                            <span class="mdi mdi-delete"></span>Delete
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>

          <!--div>
            <ul class="steps is-small">
              <li :class="entry.processo > 0 ?
                            'step-item is-completed is-info' : 'step-item'">
              </li>
              <li :class="entry.processo > 0 ?
                            'step-item is-completed is-info' : 'step-item'">
                <div class="step-marker"><span class="mdi mdi-arrow-right-bold"></span></div>
                <div class="step-details is-primary is-completed">
                  <p class="step-title ">Em Transito</p>
                </div>
              </li>
              <li :class="entry.processo >= 1 ?
                            entry.processo == 1 ? 'step-item is-completed is-success' :
                            entry.processo == 2  ? 'step-item is-completed is-warning' : 'step-item is-completed is-info' 
                          : 'step-item'">
                <div class="step-marker">
                  <span class="icon mdi mdi-wrench"></span>
                </div>
                <div class="step-details">
                  <p class="step-title">Atendendo</p>
                </div>
              </li>
              <li :class="entry.processo >= 3 ?
                            entry.processo == 3 ? 'step-item is-completed is-success' :
                            entry.processo == 4  ? 'step-item is-completed is-warning' : 'step-item is-completed is-info' 
                          : 'step-item'">
                <div class="step-marker">
                  <span class="mdi mdi-redo-variant"></span>
                </div>
                <div class="step-details">
                  <p class="step-title">Retorno</p>
                </div>
              </li>
              <li :class="entry.processo >= 5 ?
                            entry.processo == 5 ? 'step-item is-completed is-success' :
                            entry.processo == 6  ? 'step-item is-completed is-warning' : 'step-item is-completed is-info' 
                          : 'step-item'">
                <div class="step-marker">
                  <span class="icon mdi mdi-check"></span>
                </div>
                <div class="step-details">
                  <p class="step-title">Completo</p>
                </div>
              </li>
            </ul>
           
          </div-->
          <div class="buttons has-addons is-centered is-toggle is-fullwidth" style="width: 100%;">
            <a :class="entry.processo >= 1 ?
                entry.processo == 1 ? 'button is-success is-selected' : 'button is-info is-selected is-small'   
                : 'button is-light is-selected is-small' " style="width: 20%;">
              <span :class="entry.processo == 1 ? 'mdi mdi-loading mdi-spin' : 'mdi mdi-arrow-right-bold' "></span>
              <span>Em trasito</span>
              <span class="title is-4 has-text-white mdi mdi-chevron-right"></span>
            </a>
            <span :class="entry.processo >= 2 ?
                entry.processo == 2 ? 'button is-success is-selected' : 'button is-info is-selected is-small'   
                : 'button is-light is-selected is-small' " style="width: 20%;">
              <span :class="entry.processo == 2 ? 'mdi mdi-loading mdi-spin' : 'mdi mdi-wrench' "></span>
              <span>Atendendo</span>
              <span class="title is-4 has-text-white mdi mdi-chevron-right"></span>
            </span>
            <span :class="entry.processo >= 3 ?
                entry.processo == 3 ? 'button is-success is-selected' : 'button is-info is-selected is-small'   
                : 'button is-light is-selected is-small' " style="width: 20%;">
              <span :class="entry.processo == 3 ? 'mdi mdi-loading mdi-spin' : 'mdi mdi-redo-variant' "></span>
              <span>Retorno Viagem</span>
              <span class="title is-4 has-text-white mdi mdi-chevron-right"></span>
            </span>
            <span :class="entry.processo >= 4 ?
                entry.processo == 4 ? 'button is-success is-selected' : 'button is-info is-selected is-small'   
                : 'button is-light is-selected is-small' " style="width: 20%;">
              <span :class="entry.processo == 4 ? 'mdi mdi-loading mdi-spin' : 'mdi mdi-check' "></span>
              <span>Completo</span>
              <span class="title is-4 has-text-white mdi mdi-chevron-right"></span>
            </span>
          </div>
        </article>
      </div>
    </section>
    <div>
      <os-tec v-if="modalTec" v-on:close="modalTec = false" :data="modalItem"></os-tec>
      <os-edt v-if="modalEdt" v-on:close="modalEdt = false" :data="modalItem"></os-edt>
      <os-del v-if="modalDel" v-on:close="modalDel = false" :data="modalItem"></os-del>
      <os-amarrac v-if="modalOs" v-on:close="modalOs = false" :data="modalItem"></os-amarrac>
    </div>
  </div>
</template>
<script src="src/components/os/os-grid.js"></script>