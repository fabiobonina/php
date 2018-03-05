<template id="locais">
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
          <a v-on:click="modalLocalAdd = true" class="button is-link is-al">
            <span class="mdi mdi-home-modern"></span> Local
          </a>
        </div>
      </div>
      <grid-local :data="locais" :columns="gridColumns" :filter-key="search"></grid-local>
      <local-add v-if="modalLocalAdd" v-on:close="modalLocalAdd = false"></local-add>
    </section>
  </div>
</template>