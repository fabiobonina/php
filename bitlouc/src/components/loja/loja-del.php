<template id="loja-del">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">{{ proprietario.nick }} - Deletar Loja <span class="mdi mdi-store"></span></p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <message :success="successMessage" :error="errorMessage"></message>
        <!--#CONTEUDO -->
        <h1 class="title">{{ data.name }}</h1>
        <h2 class="subtitle">{{ data.nick }}</h2>
        <h2 class="subtitle">Grupo: {{ data.grupo }}, Seguimento: {{ data.seguimento }}</h2>
        
        <!--#CONTEUDO -->
      </section>
      <footer class="modal-card-foot field is-grouped is-grouped-right">
        <button class="button" v-on:click="$emit('close')">Cancel</button>
        <button :class="isLoading ? 'button is-info is-loading' : 'button is-danger'" v-on:click="deletarItem()">Deletar</button>
      </footer>
    </div>
  </div>
</template>
<script src="src/components/loja/loja-del.js"></script>