<template id="bens">
  <div>
  <div class="tabs is-small">
  <ul>
    <li class="is-active"><a>Pictures</a></li>
    <li><a>Music</a></li>
    <li><a>Videos</a></li>
    <li><a>Documents</a></li>
  </ul>
</div>
    <section class="container">
      <div class="field has-addons">
        <div class="control">
          <input v-model="search" class="input" type="text" placeholder="Search">
        </div>
        <div class="control">
          <a class="button is-info"><span class="mdi mdi-magnify"></span></a>
        </div>
        &nbsp;
        <div class="control">
          <a v-on:click="modalAdd = true" class="button is-link is-al">
            <span class="mdi mdi-home-modern"></span> Bem
          </a>
        </div>
      </div>
      <bens-grid
            :data="bens"
            :categorias="local.categoria"
            :status="active"
            :filter-key="search">
            </bens-grid>
            <bem-add v-if="modalAdd" v-on:close="modalAdd = false" ></bem-add>
      
    </section>
  </div>
</template>