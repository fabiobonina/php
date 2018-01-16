<template id="list">
  <div>
    <nav class="breadcrumb is-right" aria-label="breadcrumbs">
      <ul>
        <li class="is-active"><a href="#" aria-current="page"><span class="icon is-small"><i class="fa fa-home" aria-hidden="true"></i></span><span>Home</span></a></li>
      </ul>
    </nav>

    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-three-fifths">
            <h1 class="title"> {{ proprietario.nick }} </h1>
            <p class="subtitle"> {{ proprietario.name }} </p>
          </div>
          <div class="column">
            <nav class="level">
              <div class="level-item has-text-centered">
                <div>
                  <p class="heading">Local: <i class="fa fa-building-o"></i> {{ proprietario.locaisQt }}</p>
                  <p><i class="fa fa-map-marker"></i> {{ proprietario.locaisGeoStatus }}% ({{ proprietario.locaisGeoQt }})</span></p>
                </div>
              </div>
              <div class="level-item has-text-centered">
                <div>
                  <p class="heading">Following</p>
                  <p class="title">123</p>
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
    </section>
    <section class="container">
      <div>
        <div class="widget-user-header bg-aqua-active">
          <p class="successMessage" v-if="successMessage">{{successMessage}}</p>
          <p class="errorMessage" v-if="errorMessage">{{errorMessage}}</p>
        </div>
        <div>
          <a v-on:click="modalLojaAdd = true; selecItem(dados)" class="button is-primary is-al is-large">
            <i class="fa fa-building-o"></i> Loja Add
          </a>
        </div>
        <br>
        <grid-lojas
          :data="lojas"
          :columns="gridColumns"
          :filter-key="searchQuery">
        </grid-lojas>
      </div>
    </section>
      <!-- /.content -->
  </div>
</template>