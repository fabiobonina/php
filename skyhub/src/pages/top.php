<template id="top">


      <!-- Hero head: will stick at the top -->
      <div class="hero-head">
        <nav class="navbar">
          <div class="container">
            <div class="navbar-brand">
              <a class="navbar-item subtitle is-4 has-text-info" href="index.php" style="margin-bottom: 0;">
                <img src="img/bit-louc.png" alt="BitLOUC: Web | Mobi" width="28" height="28">
                <b class="title is-4 has-text-white">Bit</b>LOUC
              </a>
              <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                <span></span>
                <span></span>
                <span></span>
              </span>
            </div>
            <div id="navbarMenuHeroA" class="navbar-menu">
              <div class="navbar-end">
                <a class="navbar-item is-active" ><router-link to="/"> Home </router-link></a>
                <!--a class="navbar-item"><router-link to="/oss"> OS's</router-link> </a-->
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
                  <img :src="user.avatar" alt="BitLOUC: Web | Mobi" width="28" height="28"> {{ user.user }}
                </a>
              </div>
            </div>
          </div>
          <user v-if="modalUser" v-on:close="modalUser = false"></user>
        </nav>
      </div>


</template>