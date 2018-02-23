<template id="index">
  <div>
    <nav class="navbar is-link">
      <div class="navbar-brand">
        <a class="navbar-item" href="index.php">
          <img src="./img/bit-louc.png" alt="BitLOUC: Web | Mobi" width="28" height="28"> BitLOUC
        </a>
        <div class="level-item">
          <div class="field has-addons">
            <p class="control">
              <input v-model="searchQuery" class="input" type="text" placeholder="Search">
            </p>
          </div>
        </div>
        <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>

      <div id="navbarExampleTransparentExample" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item" href="index.php"> Home</a>
          <a class="navbar-item" href="#/os"> OS</a>
          <div class="navbar-item dropdown">
            <a class="navbar-link" href="__index.php">
              SkyHub
            </a>
          </div>
        </div>
        
        <div class="navbar-end">
          <div class="navbar-item">
            <div class="field is-grouped">
              <p class="control">
                <a class="bd-tw-button button" data-social-network="Twitter" data-social-action="tweet" data-social-target="http://localhost:4000" target="_blank" href="">
                  <span class="icon">
                    <i class="fa fa-twitter"></i>
                  </span>
                  <span></span>
                </a>
              </p>
              <p class="control">
                <a class="button is-primary" href="">
                  <span class="icon">
                    <i class="fa fa-download"></i>
                  </span>
                  <span></span>
                </a>
              </p>
              <a class="navbar-item" v-on:click="modalUser = true">
                <img :src="user.avatar" alt="Bulma: a modern CSS framework based on Flexbox" width="28" height="28"> {{ user.user }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <user v-if="modalUser" v-on:close="modalUser = false"></user>
  </div>
</template>