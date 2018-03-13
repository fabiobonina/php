<template id="os-grid">
  <div>
    <!-- #/SELEÇÃO DE CATEGORIA -->
    <section class="container">      
      <div class="box content">
        <article class="post" v-for="entry in filteredData">
          <div class="columns">
            <div class="column is-6">
              <h1 class="title is-5"> {{entry.lojaNick}} | {{entry.local.tipo}} - {{entry.local.name}} ({{entry.local.municipio}}/{{entry.local.uf}}) </h1>
              <p class="subtitle" style="margin-bottom: 0;"> {{entry.data}} | {{entry.servico.name}}
                <span class="pull-right"  v-for=" "> <span class="tag">{{ }}</span> &nbsp;  </span>
              </p>
              <p v-if="entry.bem">{{entry.bem.name}} {{entry.bem.modelo}}  &nbsp; <a>#{{entry.bem.fabricanteNick}} </a> 
              <p v-for="tecnico in entry.tecnicos"> <a><span class="icon mdi mdi-worker"></span> {{tecnico.user}} &nbsp;</a> </p>
            </div>
            <div class="column is-6">
              <nav class="level">
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">OS <span class="icon is-small"><i class="fa fa-wrench"></i></span></p>
                    <p class="title">  {{entry.filial}}| {{entry.os}} </p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Ativo <i class="fa fa-barcode"></i></p>
                    <p v-if="entry.bem" class="title">{{ entry.bem.plaqueta }}</p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Mapa</p>
                    <a v-if=" 0.000000 != entry.latitude"
                    :href="'https://maps.google.com/maps?q='+ entry.latitude + ',' + entry.longitude"
                    target="_blank">
                      <span class="title is-2 has-text-info mdi mdi-google-maps"></span>
                    </a>
                  </div>
                </div>
                <div v-if="user.nivel > 2 && user.grupo == 'P'" class="level-item has-text-centered">
                  <div>
                    <p class="heading">Ação</p>
                    <div class="dropdown is-right is-hoverable">
                      <div class="dropdown-trigger">
                        <a aria-haspopup="true" aria-controls="dropdown-menu1">
                          <span class="title is-2 mdi mdi-apps"></span>
                        </a>
                      </div>
                      <div class="dropdown-menu" id="dropdown-menu1" role="menu">
                        <div class="dropdown-content">
                          <a @click="modalTec = true; selecItem(entry)" class="dropdown-item">
                            <span class="mdi mdi-map-marker"></span>Tecnicos
                          </a>
                          <a @click="modalCat = true; selecItem(entry)" class="dropdown-item">
                            <span class="mdi mdi-tag-multiple"></span>Categoria
                          </a>
                          <a @click="modalEdt = true; selecItem(entry)" class="dropdown-item">
                            <span class="mdi mdi-pencil"></span>Edit
                          </a>
                          <a @click="modalDel = true; selecItem(entry)" class="dropdown-item">
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

          <div>
            <ul class="steps is-small">
              <li :class="entry.processo>1 ? 'step-item is-completed is-success' : entry.processo==1 ? 'step-item is-completed is-success' : 'step-item'">
                <div class="step-marker">
                  <span class="mdi mdi-arrow-right-bold"></span>
                </div>
                <div class="step-details is-primary is-completed">
                  <p class="step-title">Em Transito</p>
                </div>
              </li>
              <li class="step-item is-info is-completed">
                <div class="step-marker">
                  <span class="icon mdi mdi-wrench"></span>
                </div>
                <div class="step-details">
                  <p class="step-title">Atendendo</p>
                </div>
              </li>
              <li class="step-item is-warning is-completed">
                <div class="step-marker">
                  <span class="mdi mdi-redo-variant"></span>
                </div>
                <div class="step-details">
                  <p class="step-title">Retorno</p>
                </div>
              </li>
              <li class="step-item is-danger is-active">
                <div class="step-marker">
                  <span class="icon mdi mdi-flag-variant"></span>
                </div>
                <div class="step-details">
                  <p class="step-title">Completo</p>
                </div>
              </li>
            </ul>
          </div>

        </article>
      </div>
    </section>
    <div>
      <os-tec v-if="modalTec" v-on:close="modalTec = false" :data="modalItem"></os-tec>
      <os-edt v-if="modalEdt" v-on:close="modalEdt = false" :data="modalItem"></os-edt>
      <os-del v-if="modalDel" v-on:close="modalDel = false" :data="modalItem"></os-del>
    </div>
  </div>
</template>