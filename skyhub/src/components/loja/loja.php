
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
              <p class="subtitle"> {{ loja.seguimento }} - {{ loja.name }}
                <span class="pull-right tag" v-for="categoria in loja.categoria">{{ categoria.tag }}</span>
              </p>
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
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Ação</p>
                    <div class="dropdown is-right is-hoverable">
                      <div class="dropdown-trigger">
                        <button class="button  is-text" aria-haspopup="true" aria-controls="dropdown-menu1">
                          <span class="icon is-small">
                            <span class="mdi mdi-dots-vertical"></span>
                          </span>
                        </button>
                      </div>
                      <div class="dropdown-menu" id="dropdown-menu1" role="menu">
                        <div class="dropdown-content">
                          <a @click="modalEdt = true; selecItem(data)" class="dropdown-item">
                            <span class="mdi mdi-pencil"></span>Edit
                          </a>
                          <a @click="modalDel = true; selecItem(data)" class="dropdown-item">
                            <span class="mdi mdi-delete"></span>Delete
                          </a>
                          <a @click="modalCat = true; selecItem(data)" class="dropdown-item">
                            <span class="mdi mdi-tag-multiple"></span>Categoria
                          </a>
                        </div>
                      </div>
                    </div>
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
                <a><router-link :to="'/loja/'+ $route.params._id"> Locais</router-link></a>
              </li>
              <li :class="$route.path == '/loja/'+ $route.params._id +'/oss' ? 'is-active' : ''">
                <a><router-link :to="'/loja/'+ $route.params._id +'/oss'"> OS´s</router-link></a>
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