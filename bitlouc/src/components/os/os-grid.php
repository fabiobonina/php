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
        <div v-for="entry in filteredData">
          <div class="card" >
            <header class="card-header">
              <p class="card-header-title">
                <router-link :to="'/oss/' + $route.params._id + '/os/' + entry.id" class="product-title"> {{entry.local.tipo}} - {{entry.local.name}} ({{entry.local.municipio}}/{{entry.local.uf}})</router-link>
              </p>
              <a class="card-header-icon" aria-label="more options">
                <span class="icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
              </a>
            </header>
            <div class="card-content">
              <div class="content">
                <article class="post" >
                  <div class="columns">
                    <div class="column is-6 is-info">
                      <a class="product-title"><h5> {{entry.data}} | {{entry.servico.name}}  </h5></a>
                        <div class="media">
                          <div class="media-content">
                            <div class="content">
                            <p>{{entry.bem.name}} {{entry.bem.modelo}}  &nbsp; <a>#{{entry.proprietarioNick}} </a> 
                                <span class="tag"></span> 
                            </p>
                            <p v-for="tecnico in entry.tecnicos">  <span  class="tag">{{tecnico.user}}</span> &nbsp; <a># </a></p>
                          </div>
                        </div>
                      </div>
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
                                <p class="title">{{ entry.bem.plaqueta }}</p>
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
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.
                    <a href="#">@bulmaio</a>. <a href="#">#css</a> <a href="#">#responsive</a>
                    <br>
                    <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                      <!-- To test add 'active' class and 'visited' class to different li elements -->
                      <div class="checkout-wrap">
                        <p>Evolução</p>
                        <ul class="checkout-bar">
                          <li :class="entry.processo>1 ? 'visited first' : entry.processo==1 ? 'active' : ''"><a href="#">Em Transito</a></li>
                          <li :class="entry.processo>2 ? 'visited first' : entry.processo==2 ? 'active' : ''">Atendendo</li>
                          <li :class="entry.processo>3 ? 'visited first' : entry.processo==3 ? 'active' : ''">Teste</li>
                          <li :class="entry.processo>4 ? 'visited first' : entry.processo==4 ? 'active' : ''">Retorno</li>
                          <li :class="entry.processo>5 ? 'visited first' : entry.processo==5 ? 'previous visited' : ''">Completo</li>
                        </ul>
                      </div>
                    <br>
                </div>
            </div>
            <footer class="card-footer">
              <a href="#" class="card-footer-item">Save</a>
              <a href="#" class="card-footer-item">Edit</a>
              <a href="#" class="card-footer-item">Delete</a>
            </footer>
          </div>
          <br>
        </div>
        <!--article class="post" v-for="entry in filteredData">
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
        </article-->
      </div>
    </section>
  </div>
</template>