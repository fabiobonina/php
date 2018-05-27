<template id="os-del">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">OS Deletar</p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <message :success="successMessage" :error="errorMessage"></message>
        <!--#CONTEUDO -->
        
        <div v-if='data.bem'>
          <p>{{ data.bem.name }} - {{ data.bem.modelo }} <i class="fa fa-qrcode"></i> {{ data.bem.numeracao }} <i class="fa fa-fw fa-barcode"></i>{{ data.bem.plaqueta }}</p>
        </div>
        <!--#CONTEUDO -->
        <h1 class="title">{{ data.lojaNick }} | {{ data.local.tipo }} - {{ data.local.name }}</h1>
        <h2 class="subtitle">{{ data.categoria.name }}-{{ data.servico.name }}</h2>
        <h2 class="subtitle">{{ data.data }}</h2>
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
<script src="src/components/os/_delOs.js"></script>