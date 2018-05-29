<template id="local-del">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">{{ loja.nick }} - Deletar Local</p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <!--#CONTEUDO -->
        <message :success="successMessage" :error="errorMessage"></message>
        <!--#CONTEUDO -->
        <h1 class="title">{{ data.tipo }}-{{ data.name }}</h1>
        <h2 class="subtitle">{{ data.municipio }}/ {{ data.uf }}</h2>       
        <!--#CONTEUDO -->
        <!--#CONTEUDO -->
      </section>
      <footer class="modal-card-foot field is-grouped is-grouped-right">
        <button class="button" v-on:click="$emit('close')">Cancel</button>
        <button :class="isLoading ? 'button is-info is-loading' : 'button is-danger'" v-on:click="deletarItem()">Deletar</button>
      </footer>
    </div>
  </div>
</template>
<script src="src/components/local/_delLocal.js"></script>