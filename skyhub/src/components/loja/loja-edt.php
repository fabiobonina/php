<template id="loja-edt">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">{{ proprietario.nick }} - Editar Loja <span class="mdi mdi-store"></span></p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <message :success="successMessage" :error="errorMessage"></message>
        <!--#CONTEUDO -->

        <div class="field">
          <p class="control has-icons-right">
            <input v-model="data.name" class="input" type="text" placeholder="Nome">
            <span class="icon is-small is-right">
              <span class="mdi mdi-store"></span>
            </span>
          </p>
        </div>
        <div class="field">
          <p class="control has-icons-right">
            <input v-model="data.nick" class="input" type="text" placeholder="Nome Fantasia">
            <span class="icon is-small is-right">
              <span class="mdi mdi-store"></span>
            </span>
          </p>
        </div>
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Grupo / seguimento</label>
          </div>
          <div class="field-body">
            <div class="field">
              <div class="is-fullwidth">
                <p class="control has-icons-left">
                  <span class="select">
                    <select v-model="data.grupo">
                      <option v-for="option in grupos" v-bind:value="option.id">{{ option.name }}</option>
                    </select>
                  </span>
                  <span class="icon is-small is-left">
                  <span class="mdi mdi-format-text"></span>
                  </span>
                </p>
              </div>
            </div>
            <div class="field">
              <div class="is-fullwidth">
                <p class="control has-icons-left">
                  <span class="select">
                    <select v-model="data.seguimento">
                      <option v-for="option in seguimentos" v-bind:value="option.id">{{ option.name }}</option>
                    </select>
                  </span>
                  <span class="icon is-small is-left">
                  <span class="mdi mdi-format-text"></span>
                  </span>
                </p>
              </div>
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
                <input type="radio" value="1" v-model="data.ativo">
                <label for="one">Não</label>
                <input type="radio" value="0" v-model="data.ativo">
                <label for="two">Sim</label>
              </div>
            </div>
          </div>
          

        </div>
        <div>
        
        <!--#CONTEUDO -->
      </section>
      <footer class="modal-card-foot field is-grouped is-grouped-right">
        <button class="button" v-on:click="$emit('close')">Cancel</button>
        <button :class="isLoading ? 'button is-info is-loading' : 'button is-info'" v-on:click="saveItem()">Save</button>
      </footer>
    </div>
  </div>
</template>