<template id="os-edt">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">OS: {{ data.local.tipo }} - {{ data.local.name }} </p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <message :success="successMessage" :error="errorMessage"></message>
        <!--#CONTEUDO -->
        
        <div v-if='data.bem'>
          <p>{{ data.bem.name }} - {{ data.bem.modelo }} <i class="fa fa-qrcode"></i> {{ data.bem.numeracao }} <i class="fa fa-fw fa-barcode"></i>{{ data.bem.plaqueta }}</p>
        </div>
        
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">DataOS</label>
          </div>
          <div class="field-body">
            <div class="field">
              <p class="control is-expanded has-icons-left">
                <input v-model="data.data" class="input" type="date">
                <span class="icon is-small is-left">
                  <span class="mdi mdi-calendar mdi-dark is-left"></span>
                </span>
              </p>
            </div>
          </div>
        </div>
      
        <div class="field is-horizontal">
          <div class="field-label">
            <label class="label">Serviço</label>
          </div>
          <div class="field-body">
            <div class="field has-addons">
              <p class="control">
                <a class="button is-static">
                  <span class="mdi mdi-settings"></span>
                </a>
              </p>
              <p class="control">
                  <v-select label="name" v-model="data.servico" :options="servicos"></v-select>
              </p>
            </div>
          </div>
        </div>

        <div v-if="!data.bem" class="field is-horizontal">
          <div class="field-label">
            <label class="label">Categoria</label>
          </div>
          <div class="field-body">
            <div class="field has-addons">
              <p class="control">
                <a class="button is-static">
                  <span class="mdi mdi-tag"></span>
                </a>
              </p>
              <p class="control">
                <v-select label="name" v-model="data.categoria" :options="categorias"></v-select>
              </p>
            </div>
          </div>
        </div>
        
        <div class="field is-horizontal">
          <div class="field-label">
            <label class="label">Ativo?</label>
          </div>
          <div class="field-body">
            <div class="field is-narrow">
              <div class="control">
                <label class="radio">
                  <input value="0" v-model="data.ativo" type="radio"> Yes
                </label>
                <label class="radio">
                  <input value="1" v-model="data.ativo" type="radio">  No
                </label>
              </div>
            </div>
          </div>
        </div>
        
        <!--#CONTEUDO -->
      </section>
      <footer class="modal-card-foot field is-grouped is-grouped-right">
        <button class="button" v-on:click="$emit('close')">Cancel</button>
        <button :class="isLoading ? 'button is-info is-loading' : 'button is-info'" v-on:click="saveItem()">Save</button>
      </footer>
    </div>
  </div>
</template>
<script src="src/components/loja/loja-edt.js"></script>