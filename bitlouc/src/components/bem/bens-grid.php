<template id="bens-grid">
  <div>
    <div>
      <div class="radio">
        <label><input type="radio" v-model="selectedCategoria" value="All">All </label>&nbsp;&nbsp;&nbsp;
        <label v-for=" categoria in categorias"><input type="radio" v-model="selectedCategoria" v-bind:value="categoria.id">{{ categoria.name }} &nbsp;&nbsp;&nbsp;</label>
      </div>
    </div>
    <!-- #/SELEÇÃO DE CATEGORIA -->
    <section class="container">
      <div class="box content">
        <article class="post" v-for="entry in filteredData">
          <div class="columns">
            <div class="column is-6">
              <a :href="'#/loja/' + $route.params._id + '/local/' + entry.id" class="product-title"><h5>{{entry.name}} - {{entry.modelo}}</h5></a>
              <div class="media">
                <div class="media-left">
                  <p class="image is-32x32">
                    <img src="http://bulma.io/images/placeholders/128x128.png">
                  </p>
                </div>
                <div class="media-content">
                  <div class="content">
                    <p>{{entry.fabricanteNick}}  &nbsp; <a>#{{entry.proprietarioNick}} </a> 
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
                    <p class="heading">Ativo <i class="fa fa-fw fa-barcode"></i></p>
                    <p class="title">{{ entry.plaqueta }}</p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p><button v-on:click="modalOsAdd = true; selecItem(entry)" class="button">Abrir OS</button></p>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </article>
      </div>
    </section>
    <os-add v-if="modalOsAdd" v-on:close="modalOsAdd = false"  v-on:atualizar="onAtualizar"></os-add>
  </div>
</template>