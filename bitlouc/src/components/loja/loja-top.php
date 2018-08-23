<template id="loja-top">
  <div>
    <v-toolbar color="cyan" dark tabs extended>
      <v-btn @click="$router.go(-1)" icon>
        <v-icon>arrow_back</v-icon>
      </v-btn>
      <v-toolbar-title> {{ loja.nick }}</v-toolbar-title>
      <v-spacer></v-spacer>
      <div class="text-xs-center">
        <v-badge left>
          <v-icon slot="badge" dark small>location_city</v-icon>
          <span>Local: {{ loja.locaisQt }}</span>
        </v-badge>
        &nbsp;&nbsp;
        <v-badge color="green">
          <v-icon slot="badge" dark small>place</v-icon>
          <span>{{ loja.locaisGeoStatus }}% ({{ loja.locaisGeoQt }})</span>
        </v-badge>
        &nbsp;
      </div>

      <v-btn icon>
        <v-icon>more_vert</v-icon>
      </v-btn>
      <v-tabs slot="extension" centered color="cyan" slider-color="yellow">
        <v-tab v-for="n in router" :key="n.title" :to="'/loja/'+ $route.params._id + n.router" ripple> {{ n.title }} </v-tab>
      </v-tabs>
    </v-toolbar>

    <section>
      <div class="hero-body" style="padding:0;">
        <div>
          <div>
            <div>
              <h1 class="title  is-4"> {{ loja.nick }} </h1>
              <p class="subtitle" style="margin-bottom: 0;"> {{ loja.name }}
                <span class="pull-right"  v-for="categoria in loja.categoria"> <span class="tag">{{ categoria.tag }}</span> &nbsp;  </span>
              </p>
              <p>Seguimento:  &nbsp; <a>#{{loja.seguimento}} </a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script src="src/components/loja/loja-top.js"></script>