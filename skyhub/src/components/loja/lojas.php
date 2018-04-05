<template id="lojas">
  <div>
    <section class="container">
      <div class="field has-addons">
        &nbsp;
        <div v-if="user.nivel > 2 && user.grupo == 'P'" class="control">
          <a v-on:click="modalLojaAdd = true" class="button is-link is-al">
            <span class="mdi mdi-store"></span> Loja
          </a>
        </div>
      </div>
      <grid-lojas :data="lojas"></grid-lojas>
      <loja-add v-if="modalLojaAdd" v-on:close="modalLojaAdd = false"></loja-add>
    </section>
  </div>
</template>