<template id="projeto">
  <div>
    <section class="hero is-link">
      <!-- Hero head: will stick at the top -->
      <top></top>
      <!-- Hero content: will be in the middle -->
      <div class="hero-body"    style="padding:0;">
        <div class="container has-text-centered">
          <div class="columns">
            <div class="column is-two-fifths has-text-left">
              <h1 class="title is-4 "> {{ proprietario.nick }} </h1>
              <p class="subtitle"> {{ proprietario.name }} </p>
            </div>
            <div class="column">
              <nav class="level">
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Local</p>
                    <p class="title is-4"> {{ proprietario.locaisQt }} <span class="icon is-small"> <i class="fa fa-building-o"></i></span></p>
                    <p> {{ proprietario.locaisGeoStatus }}% ({{ proprietario.locaisGeoQt }})<span class="icon"><i class="fa fa-map-marker"></i></span></p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">OS´s</p>
                    <p class="title is-4"> {{ osProprietario.osQt }} <span class="icon is-small"><i class="fa fa-wrench"></i></span></p>
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
              <li :class="$route.path == '/' ? 'is-active' : ''" ><a href="#/" >Dashboard</a></li>
              <li :class="$route.path == '/oss' ? 'is-active' : ''" ><a href="#/oss" >OS´s</a></li>
              <li :class="$route.path == '/lojas' ? 'is-active' : ''" ><a href="#/lojas" >Lojas</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </section>
    <div>
      <input v-model="message" v-on:input="set_data()" >
      <p>User input: {{ message }}</p>
      <p>Data from storage: {{ item }}</p>
      <button class="button is-info" v-on:click="remove_data()">Deletar</button>
      <router-view></router-view>
    </div>
  </div>
</template>