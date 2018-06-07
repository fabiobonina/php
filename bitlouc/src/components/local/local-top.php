<template id="local-top">
  <div>
  <v-toolbar color="cyan" dark tabs extended>
      <v-btn @click="$router.go(-1)" icon>
        <v-icon>arrow_back</v-icon>
      </v-btn>
      <v-toolbar-title> {{ local.tipo }} - {{ local.name }} </v-toolbar-title>
      <v-spacer></v-spacer>
      <div class="text-xs-center">
        <v-badge left>
          <v-icon slot="badge" dark small>location_city</v-icon>
          <span> {{ local.id }}</span>
        </v-badge>
        &nbsp;&nbsp;
        <v-badge color="green">
          <v-icon slot="badge" dark small>place</v-icon>
          <span>{{ local.locaisGeoStatus }}% ({{ local.locaisGeoQt }})</span>
        </v-badge>
        &nbsp;
      </div>
      <v-btn :disabled=" 0.000000 == local.latitude" :href="'https://maps.google.com/maps?q='+ local.latitude + ',' + local.longitude" target="_blank" fab icon dark color="primary">
        <v-icon dark>directions</v-icon>
      </v-btn>
      <v-btn icon>
        <v-icon>more_vert</v-icon>
      </v-btn>
      <v-tabs slot="extension" centered color="cyan" slider-color="yellow">
        <v-tab v-for="n in router" :key="n.title" :to="'/loja/'+ $route.params._id + n.router" ripple> {{ n.title }} </v-tab>
      </v-tabs>
    </v-toolbar>
    <section class="hero is-link">
      <!-- Hero head: will stick at the top -->
      <top></top>
      <!-- Hero content: will be in the middle -->
      <div class="hero-body" style="padding:0;">
        <div class="container has-text-centered">
          <div class="columns">
            <div class="column is-two-fifths has-text-left">
              <h1 class="title is-4"> {{ local.tipo }} - {{ local.name }}</h1>
              <p class="subtitle" style="margin-bottom: 0;"> {{ local.municipio }}/{{ local.uf }}
                <span class="pull-right"  v-for="categoria in local.categoria"> <span class="tag">{{ categoria.tag }}</span> &nbsp;  </span>
              </p>
              <p>{{ loja.nick }}: Regional: &nbsp; <a>#{{local.regional}} </a></p>
            </div>
        </div>
      </div>
      <!-- Hero footer: will stick at the bottom -->
      <div class="hero-foot">
        <nav class="tabs">
          <div class="container">
            <ul>
              <li class="is-active">
                <a @click="$router.go(-1)" class="btn btn-default"><span class="title is-5 mdi mdi-arrow-left"></span></a>
              </li>
              <li :class="$route.path == '/loja/'+ $route.params._id +'/local/'+ $route.params._local ? 'is-active' : ''">
                <a :href="'#/loja/'+ $route.params._id +'/local/'+ $route.params._local">Bens</a>
              </li>
              <li :class="$route.path == '/loja/'+ $route.params._id +'/local/'+ $route.params._local +'/oss-local' ? 'is-active' : ''">
                <a :href="'#/loja/'+ $route.params._id +'/local/'+ $route.params._local +'/oss-local'" >OS´s Local</a>
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
<script src="src/components/local/local-top.js"></script>