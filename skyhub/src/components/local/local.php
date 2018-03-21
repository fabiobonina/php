<template id="local">
  <div>
    <section class="hero is-link">
      <!-- Hero head: will stick at the top -->
      <top></top>
      <!-- Hero content: will be in the middle -->
      <div class="hero-body">
        <div class="container has-text-centered">
          <div class="columns">
            <div class="column is-two-fifths has-text-left">
              <h1 class="title"> {{ local.tipo }} - {{ local.name }}</h1>
              <p class="subtitle" style="margin-bottom: 0;"> {{ local.municipio }}/{{ local.uf }}
                <span class="pull-right"  v-for="categoria in local.categoria"> <span class="tag">{{ categoria.tag }}</span> &nbsp;  </span>
              </p>
              <p>{{ loja.nick }}: Regional: &nbsp; <a>#{{local.regional}} </a></p>
            </div>
            <div class="column">
              <nav class="level">
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Local</p>
                    <p class="title is-4"> {{ loja.locaisQt }} <span class="icon is-small"> <i class="fa fa-building-o"></i></span></p>
                    <p> {{ loja.locaisGeoStatus }}% ({{ loja.locaisGeoQt }})<span class="icon"><i class="fa fa-map-marker"></i></span></p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">OS´s</p>
                    <p class="title is-4"> {{  }} <span class="icon mdi mdi-wrench"></span></p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Rota</p>
                    <a v-if=" 0.000000 != local.latitude"
                    :href="'https://maps.google.com/maps?q='+ local.latitude + ',' + local.longitude"
                    target="_blank">
                      <span class="title is-3 has-text-info mdi mdi-directions"></span>
                    </a>
                  </div>
                </div>
              </nav>
            </div>
          </div>
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
    <nav class="breadcrumb is-right" aria-label="breadcrumbs">
      <ul>
        <li><router-link to="/"> Home</router-link></li>
        <li><router-link :to="'/loja/' + $route.params._id"> Loja</router-link></li>
        <li class="is-active"><a aria-current="page">Local</a></li>
      </ul>
    </nav>

  </div>
</template>