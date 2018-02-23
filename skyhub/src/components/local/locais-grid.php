<template id="grid-local">
  <div>
    <section class="container">      
      <div class="box content">
        <article class="post" v-for="entry in filteredData">
          <div class="columns">
            <div class="column is-6">
              <a :href="'#/loja/' + $route.params._id + '/local/' + entry.id" class="product-title"><h5> {{entry.tipo}} - {{entry.name}}</h5></a>
              <div class="media">
                <div class="media-left">
                  <p class="image is-32x32">
                    <img src="http://bulma.io/images/placeholders/128x128.png">
                  </p>
                </div>
                <div class="media-content">
                  <div class="content">
                    <p>{{entry.municipio}} /{{entry.uf}}  &nbsp; <a>#{{entry.regional}} </a> 
                      <span class="tag" v-for="categoria in entry.categoria">{{ categoria.tag }} </span> 
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="column is-6">
              <nav class="level">
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Local: <i class="fa fa-building-o"></i> {{ entry.locaisQt }}</p>
                    <p><i class="fa fa-map-marker"></i> {{ entry.locaisGeoStatus }}% ({{ entry.locaisGeoQt }})</span></p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Following</p>
                    <p class="title">123</p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <a v-if=" 0.000000 != entry.latitude" :href="'https://maps.google.com/maps?q='+ entry.latitude + '%2C' + entry.longitude" target="_blank">
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
    <div>
      <geolocalizacao v-if="showModal" v-on:close="onClose" v-on:atualizar="onAtualizar" :data="modalItem"></geolocalizacao>
    </div>
  </div>
</template>