<template id="local-geo">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">{{data.tipo}} - {{data.name}}, {{data.municipio}}/{{data.uf}}</p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <!--#CONTEUDO -->
        <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
        Coordenadas atual: {{ data.latitude }}, {{ data.longitude }}
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Coordenadas:</label>
          </div>
          <div class="field-body">
            <div class="field">
              <p class="control is-expanded has-icons-left">
                <input v-model="coordenadas" class="input" type="text" placeholder="Coordenadas">
                <span class="icon is-small is-left">
                  <i class="fa fa-map-marker"></i>
                </span>
              </p>
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