<template id="local">
  <div>
    <nav class="breadcrumb is-right" aria-label="breadcrumbs">
      <ul>
        <li><router-link to="/"> Home</router-link></li>
        <li><router-link :to="'/loja/' + $route.params._id"> Loja</router-link></li>
        <li class="is-active"><a aria-current="page">Local</a></li>
      </ul>
    </nav>
    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-three-fifths">
            <h1 class="title"> {{ loja.nick }}: {{ local.tipo }} - {{ local.name }} </h1>
            <p class="subtitle"> {{ local.municipio }}/ {{ local.uf }} <span class="pull-right tag" v-for="categoria in local.categoria">{{ categoria.tag }}</span></p>
          </div>
          <div class="column">
            <nav class="level">
              <div class="level-item has-text-centered">
                <div>
                  <p class="heading">Local: <i class="fa fa-building-o"></i> </p>
                  <p><i class="fa fa-map-marker"></i> % ()</span></p>
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
                  <a v-if=" 0.000000 != local.latitude" :href="'https://maps.google.com/maps?q='+ local.latitude + '%2C' + local.longitude" target="_blank">
                    <span><i class="fa fa-map"></i> Como chegar</span>
                  </a>
                  <p><button v-on:click="showModal = true; selecItem(local)" class="button">Geoposição</button></p>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <section class="container">
      <div>
        <div class="tabs is-toggle">
          <ul>
            <li :class="active==1 ? 'is-active' : ''" @click="active='1'">
              <a>
                <span class="icon is-small"><i class="fa fa-building-o"></i></span>
                <span>Operação</span>
              </a>
            </li>
            <li :class="active==0 ? 'is-active' : ''" @click="active='0'">
              <a>
                <span class="icon is-small"><i class="fa fa-music"></i></span>
                <span>Instalação</span>
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
            <div>
              <a v-on:click="modalBemAdd = true" class="button is-primary is-al">
                <i class="fa fa-qrcode"></i> Bem
              </a>
            </div>
            <br>
            <bens-grid
            :data="bens"
            :categorias="local.categoria"
            :status="active"
            :filter-key="searchQuery">
            </bens-grid>
            <bem-add v-if="modalBemAdd" v-on:close="modalBemAdd = false"  v-on:atualizar="onAtualizar"></bem-add>
          </div>
          <div  v-if="active==1">
            <div>
              <a v-on:click="modalBemAdd = true" class="button is-primary is-al">
                <i class="fa fa-qrcode"></i> Bem
              </a>
            </div>
            <br>
            <bens-grid
            :data="bens"
            :categorias="local.categoria"
            :status="active"
            :filter-key="searchQuery">
            </bens-grid>
            <bem-add v-if="modalBemAdd" v-on:close="modalBemAdd = false"  v-on:atualizar="onAtualizar"></bem-add>
          </div>
          <div  v-if="active==2">
            <div>
              <a v-on:click="modalBemAdd = true" class="button is-primary is-al">
                <i class="fa fa-qrcode"></i> Bem
              </a>
            </div>
            <br>
            <bens-grid
            :data="bens"
            :categorias="local.categoria"
            :status="active"
            :filter-key="searchQuery">
            </bens-grid>
            <bem-add v-if="modalBemAdd" v-on:close="modalBemAdd = false"  v-on:atualizar="onAtualizar"></bem-add>
          </div>
        </section>
      </div>
    </section>
  </div>
</template>