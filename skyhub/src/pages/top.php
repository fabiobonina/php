<template id="top">
  <div>
    <section class="hero is-link">
      <!-- Hero head: will stick at the top -->
      <div class="hero-head">
        <nav class="navbar">
          <div class="container">
            <div class="navbar-brand">
              <a class="navbar-item subtitle is-4 has-text-info" href="index.php" style="margin-bottom: 0;">
                <img src="./img/bit-louc.png" alt="BitLOUC: Web | Mobi" width="28" height="28">
                <b class="title is-4 has-text-white">Bit</b>LOUC
              </a>
              <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                <span>teste</span>
                <span></span>
                <span></span>
              </span>
            </div>
            <div id="navbarMenuHeroA" class="navbar-menu">
              <div class="navbar-end">
                <a class="navbar-item is-active">  Home </a>
                <a class="navbar-item"><router-link to="/oss"> OS's</router-link> </a>
                <a class="navbar-item" href="__index.php"> SkyHub </a>
                <span class="navbar-item">
                  <a class="button is-primary is-inverted">
                    <span class="icon">
                      <i class="fab fa-github"></i>
                    </span>
                    <span>Download</span>
                  </a>
                </span>
                <a class="navbar-item" v-on:click="modalUser = true">
                  <img :src="user.avatar" alt="Bulma: a modern CSS framework based on Flexbox" width="28" height="28"> {{ user.user }}
                </a>
              </div>
            </div>
          </div>
          <user v-if="modalUser" v-on:close="modalUser = false"></user>
        </nav>
      </div>

      <!-- Hero content: will be in the middle -->
      <div class="hero-body">
        <div class="container has-text-centered">
          <div class="columns">
            <div class="column is-three-fifths has-text-left">
              <h1 class="title"> {{ proprietario.nick }} </h1>
              <p class="subtitle"> {{ proprietario.name }} </p>
            </div>
            <div class="column">
              <nav class="level">
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Local</p>
                    <p class="title"> {{ proprietario.locaisQt }} <span class="icon is-small has-text-info"> <i class="fa fa-building-o"></i></span></p>
                    <p> {{ proprietario.locaisGeoStatus }}% ({{ proprietario.locaisGeoQt }})<span class="icon has-text-success"><i class="fa fa-map-marker"></i></span></p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">OS´s</p>
                    <p class="title"> {{ osProprietario.osQt }} <span class="icon is-small has-text-warning"><i class="fa fa-wrench"></i></span></p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Followers</p>
                    <p class="title">456K</p>
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
              <li :class="active==0 ? 'is-active' : ''" @click="active='0'"><a><router-link to="/"> Dashboard</router-link></a></li>
              <li :class="active==1 ? 'is-active' : ''" @click="active='1'"><a><router-link to="/"> OS´s</router-link></a></li>
              <li :class="active==2 ? 'is-active' : ''" @click="active='2'"><a><router-link to="/lojas"> Lojas</router-link></a></li>
            </ul>
          </div>
        </nav>
      </div>
    </section>
  </div>
</template>