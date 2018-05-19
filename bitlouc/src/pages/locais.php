<template id="locais">
  <div>
    <section class="container">
      <div class="field has-addons">
        <div class="control">
          <a v-on:click="modalLocalAdd = true" class="button is-link is-al">
            <span class="mdi mdi-home-modern"></span> Local
          </a>
        </div>
        &nbsp;
      </div>
      <grid-local :data="locais"></grid-local>
      <local-add v-if="modalLocalAdd" v-on:close="modalLocalAdd = false"></local-add>
    </section>
  </div>
</template>
<script src="src/pages/locais.js"></script>