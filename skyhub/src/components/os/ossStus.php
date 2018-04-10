
<template id="oss-stus">
  <div>
      <div class="field has-addons">
        <div v-if="user.nivel > 1 && user.grupo == 'P'" class="control">
          
          <a v-on:click="status = '0'" class="button is-info is-al">
            <span class="mdi mdi-check"></span>sem Amaração
          </a>
          <a v-on:click="status = '1'" class="button is-info is-al">
            <span class="mdi mdi-check"></span>Abertas
          </a>
          <a v-on:click="status = '2'" class="button is-info is-al">
            <span class="mdi mdi-check"></span> Retornos
          </a>
        </div>
        &nbsp;
        <div v-if="user.nivel > 2 && user.grupo == 'P'" class="control">
          <a v-on:click="status = '3'" class="button is-info is-al">
            <span class="mdi mdi-check"></span>Fechardas
          </a>
        </div>
      </div>
    <nav class="is-right" aria-label="breadcrumbs">
      <ul>
        <li><router-link to="/"> Home</router-link></li>
        <li class="is-active"><a aria-current="page">Os´s</a></li>
      </ul>
    </nav>
    
    <section class="container">
      <div>
        <os-grid :data="oss" :status="status"></os-grid>
      </div>
      <!-- /.box -->
    </section>
  </div>
</template>