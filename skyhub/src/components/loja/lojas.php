<template id="lojas">
  <div>
    <section class="container">
      <div class="field has-addons">
        <div class="control">
          <input v-model="search" class="input" type="text" placeholder="Search">
        </div>
        <div class="control">
          <a class="button is-info"><span class="mdi mdi-magnify"></span></a>
        </div>
        &nbsp;
        <div v-if="user.nivel > 2 && user.grupo == 'P'" class="control">
          <a v-on:click="modalLojaAdd = true" class="button is-link is-al">
            <span class="mdi mdi-store"></span> Loja
          </a>
        </div>
      </div>
      <grid-lojas :data="lojas" :columns="gridColumns" :filter-key="search"></grid-lojas>
      <loja-add v-if="modalLojaAdd" v-on:close="modalLojaAdd = false"></loja-add>
    </section>
  </div>
</template>