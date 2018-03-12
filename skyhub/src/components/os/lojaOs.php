
<template id="loja-oss">
  <div>
    <nav class="is-right" aria-label="breadcrumbs">
      <ul>
        <li><router-link to="/"> Home</router-link></li>
        <li class="is-active"><a aria-current="page">Os´s</a></li>
      </ul>
    </nav>
    
    <section class="container">
      <div>
        <div class="tabs is-toggle">
          <ul>
            <li :class="active==1 ? 'is-active' : ''" @click="active=1">
              <a>
                <span class="icon is-small"><i class="fa fa-building-o"></i></span>
                <span>Locais</span>
              </a>
            </li>
            <li :class="active==2 ? 'is-active' : ''" @click="active=2">
              <a>
                <span class="icon is-small"><i class="fa fa-music"></i></span>
                <span>Bens Ocioso</span>
              </a>
            </li>
            <li>
              <a>
                <span class="icon is-small"><i class="fa fa-film"></i></span>
                <span>Videos</span>
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
          <div  v-if="active==1">
            <div class="widget-user-header bg-aqua-active">
              <p class="successMessage" v-if="successMessage">{{successMessage}}</p>
              <p class="errorMessage" v-if="errorMessage">{{errorMessage}}</p>
            </div>
            <div>
              <a v-on:click="modalLocalAdd = true" class="button is-primary is-al">
                <i class="fa fa-building-o"></i> Local Add
              </a>
            </div>
            <br>
            <os-grid
              :data="oss"
              :columns="gridColumns"
              :estado= "estado.nivel0">
            </os-grid>
            
          </div>
        </section>
        <local-add v-if="modalLocalAdd" v-on:close="modalLocalAdd = false" :data="loja" @atualizar="onAtualizar"></local-add>
      </div>
      <!-- /.box -->
    </section>
  </div>
</template>