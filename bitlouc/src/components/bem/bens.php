<template id="bens">
  <div>
    <section class="container">
      <div class="tabs is-small">
        <ul>
          <li :class="active==1 ? 'is-active' : ''" @click="active='1'"><a>Operação</a></li>
          <li :class="active==0 ? 'is-active' : ''" @click="active='0'"><a>Instalação</a></li>
          <li :class="active==2 ? 'is-active' : ''" @click="active='2'"><a>Ocioso</a></li>
        </ul>
      </div>
    </section>
    <br>
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
            <span class="mdi mdi-file-tree"></span> Bem
          </a>
        </div>
        &nbsp;
        <div class="control">
          <a v-on:click="modalOs = true" class="button is-link is-al">
            <span class="mdi mdi-wrench"></span> OS
          </a>
        </div>
      </div>
      <bens-grid :data="bens" :categorias="local.categoria" :status="active" :filter-key="search"></bens-grid>
      <bem-add v-if="modalAdd" v-on:close="modalAdd = false" ></bem-add>
      <os-add v-if="modalOs" v-on:close="modalOs = false"  :data="modalItem"></os-add>
    </section>
  </div>
</template>
<script src="src/components/bem/bens.js"></script>