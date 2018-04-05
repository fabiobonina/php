
<template id="loja">
  <div>
    <section class="hero is-link">
      <!-- Hero head: will stick at the top -->
      <top></top>
      <!-- Hero content: will be in the middle -->
      <div class="hero-body">
        <div class="container has-text-centered">
          <div class="columns">
            <div class="column is-two-fifths has-text-left">
              <h1 class="title"> {{ loja.nick }} </h1>
              <p class="subtitle" style="margin-bottom: 0;"> {{ loja.name }}
                <span class="pull-right"  v-for="categoria in loja.categoria"> <span class="tag">{{ categoria.tag }}</span> &nbsp;  </span>
              </p>
              <p>Seguimento:  &nbsp; <a>#{{loja.seguimento}} </a></p>
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
                    <p class="title is-4"> {{  }} <span class="icon is-small"><i class="fa fa-wrench"></i></span></p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Followers</p>
                    <p class="title is-4">456K</p>
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
              <li class="is-active">
                <a @click="$router.go(-1)" class="btn btn-default"><span class=" title is-5 mdi mdi-arrow-left"></span></a>
              </li>
              <li :class="$route.path == '/loja/'+ $route.params._id ? 'is-active' : ''">
                <a><router-link :to="'/loja/'+ $route.params._id"> Locais</router-link></a>
              </li>
              <li :class="$route.path == '/loja/'+ $route.params._id +'/lojaos' ? 'is-active' : ''">
                <a><router-link :to="'/loja/'+ $route.params._id +'/lojaos'"> OS´s</router-link></a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </section>
    <br>
    <div>
      <router-view></router-view>
    </div>
  </div>
</template>