<template id="top">
<div>
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
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link" href="/documentation/overview/start/">
              Docs
            </a>
            <div class="navbar-dropdown is-boxed">
              <a class="navbar-item" href="/documentation/overview/start/">
                Overview
              </a>
            </div>
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
    
  </div>
  <section class="hero is-primary">
  <!-- Hero head: will stick at the top -->
  <div class="hero-head">
    <nav class="navbar">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item is-3 has-text-info" href="index.php">
            <img src="./img/bit-louc.png" alt="BitLOUC: Web | Mobi" width="28" height="28">
            <strong class=" is-3 has-text-white">Bit</strong><strong>LOUC</strong>
          </a>
          <span class="navbar-burger burger" data-target="navbarMenuHeroA">
            <span>teste</span>
            <span></span>
            <span></span>
          </span>
        </div>
        <div id="navbarMenuHeroA" class="navbar-menu">
          <div class="navbar-end">
            <a class="navbar-item is-active">
              Home
            </a>
            <a class="navbar-item">
              Examples
            </a>
            <a class="navbar-item">
              Documentation
            </a>
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
      <h1 class="title">
        Title
      </h1>
      <h2 class="subtitle">
        Subtitle
      </h2>
    </div>
  </div>

  <!-- Hero footer: will stick at the bottom -->
  <div class="hero-foot">
    <nav class="tabs">
      <div class="container">
        <ul>
          <li class="is-active"><a>Overview</a></li>
          <li><a>Modifiers</a></li>
          <li><a>Grid</a></li>
          <li><a>Elements</a></li>
          <li><a>Components</a></li>
          <li><a>Layout</a></li>
        </ul>
      </div>
    </nav>
  </div>
</section>
</div>
</template>