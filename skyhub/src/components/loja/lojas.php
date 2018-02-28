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
        <div class="control">
          <a v-on:click="modalLojaAdd = true; selecItem(dados)" class="button is-link is-al">
            <span class="mdi mdi-store"></span> Loja
          </a>
        </div>
      </div>
      <grid-lojas :data="lojas" :columns="gridColumns" :filter-key="search"></grid-lojas>
      <loja-add v-if="modalLojaAdd" v-on:close="modalLojaAdd = false" @atualizar="onAtualizar"></loja-add>
    </section>
  </div>
</template>