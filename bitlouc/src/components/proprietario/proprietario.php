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
    </section>
    <section class="container">
      <div>
        <div class="widget-user-header bg-aqua-active">
          <p class="successMessage" v-if="successMessage">{{successMessage}}</p>
          <p class="errorMessage" v-if="errorMessage">{{errorMessage}}</p>
        </div>
      </div>
    </section>
    <section class="container">
      <div>
        <div class="tabs is-toggle">
          <ul>
            <li :class="active==0 ? 'is-active' : ''" @click="active='0'">
              <a>
                <span class="icon is-small"><i class="fa fa-building-o"></i></span>
                <span>OS´s</span>
              </a>
            </li>
            <li :class="active==1 ? 'is-active' : ''" @click="active='1'">
              <a>
                <span class="icon is-small"><i class="fa fa-music"></i></span>
                <span>Lojas</span>
              </a>
            </li>
            <li :class="active==2 ? 'is-active' : ''" @click="active='2'">
              <a>
                <span class="icon is-small"><i class="fa fa-film"></i></span>
                <span>Ocioso</span>
              </a>
            </li>
            <li>
              <a>
                <span class="icon is-small"><i class="fa fa-file-text-o"></i></span>
                <span>Documents</span>
              </a>
            </li>
          </ul>
        </div>
        <section class="container">
          <div  v-if="active==0">
            <os-lojas>
            </os-lojas>
          </div>
          <div  v-if="active==1">
            <div>
              <a v-on:click="modalLojaAdd = true; selecItem(dados)" class="button is-primary is-al">
                <i class="fa fa-building-o"></i> Loja
              </a>
            </div>
            <br>
            <grid-lojas
              :data="lojas"
              :columns="gridColumns">
            </grid-lojas>
          </div>
          <div  v-if="active==2">
            
          </div>
        </section>
      </div>
    </section>
      <!-- /.content -->
  </div>
</template>