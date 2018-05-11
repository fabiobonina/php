<template id="os-amarrac">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">OS {{data.servico.name }} - {{ data.local.name }},</p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <!--#CONTEUDO -->
        <message :success="successMessage" :error="errorMessage"></message>
        Numero atual: {{ data.filial }} | {{ data.os }}
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Filial | OS</label>
          </div>
          <div class="field-body">
            <div class="field">
              <p class="control is-expanded">
                <v-select label="name" v-model="filial" :options="filiais"></v-select>
              </p>
            </div>
            <div class="field">
              <p class="control is-expanded has-icons-right">
                <input v-model="os" class="input" type="text" placeholder="OS">
                <span class="icon is-small is-right">
                  <span class="mdi mdi-wrench"></span>
                </span>
              </p>
            </div>
          </div>
        </div>
        <br>
        <!--#CONTEUDO -->
      </section>
      <footer class="modal-card-foot field is-grouped is-grouped-right">
      <button class="button" v-on:click="$emit('close')">Cancel</button>
        <button :class="isLoading ? 'button is-info is-loading' : 'button is-info'" v-on:click="saveItem()">Save</button>
      </footer>
    </div>
  </div>
</template>
<script src="src/components/os/os-amarrac.js"></script>