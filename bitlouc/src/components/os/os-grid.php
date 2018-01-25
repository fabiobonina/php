<template id="os-grid">
  <div>
      <!--div>
        <div class="radio">
          <label><input type="radio" v-model="selectedCategoria" value="All">All </label>&nbsp;&nbsp;&nbsp;
          <label v-for=" categoria in categorias"><input type="radio" v-model="selectedCategoria" v-bind:value="categoria.id">{{ categoria.name }} &nbsp;&nbsp;&nbsp;</label>
        </div>
      </div-->
      <!-- #/SELEÇÃO DE CATEGORIA -->
      <section class="container">      
      <div class="box content">
        <article class="post" v-for="entry in filteredData">
          <div class="columns">
            <div class="column is-6">
              <a :href="'#/oss/' + $route.params._id + '/os/' + entry.id" class="product-title"><h5>{{entry.local.tipo}} - {{entry.local.name}} ({{entry.local.municipio}}/{{entry.local.uf}})</h5></a>
              <div class="media">
                <div class="media-content">
                  <div class="content">
                    <p>{{entry.data}} | {{entry.servico.name}}  &nbsp; <a>#{{entry.proprietarioNick}} </a> 
                      <span class="tag">{{entry.proprietarioNick}}</span> 
                    </p>
                    <p>{{entry.bem.name}} {{entry.bem.modelo}}  &nbsp; <a>#{{entry.proprietarioNick}} </a> 
                      <span class="tag">{{entry.proprietarioNick}}</span> 
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="column is-6">
              <nav class="level">
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Numeração <i class="fa fa-qrcode"></i></p>
                    <p class="title"> {{ entry.numeracao }}</p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Ativo <i class="fa fa-barcode"></i></p>
                    <p class="title">{{ entry.plaqueta }}</p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <a v-if=" 0.000000 != entry.local.latitude" :href="'https://maps.google.com/maps?q='+ entry.local.latitude + '%2C' + entry.local.longitude" target="_blank">
                      <span>Mapa <i class="fa fa-map"></i></span>
                    </a>
                    <p class="field">
                      <a v-on:click="showModal = true; selecItem(entry)" class="button is-small is-info">
                        <span>Geoposição</span>
                        <span class="icon is-small"><i class="fa fa-map-marker"></i></span>
                      </a>
                    </p>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </article>
      </div>
    </section>
  </div>
</template>