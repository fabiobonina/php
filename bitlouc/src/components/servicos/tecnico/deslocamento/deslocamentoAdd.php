<template id="deslocamento-add">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Delocamento: {{data.name}}, {{data.municipio}} /{{data.uf}}</p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <!--#CONTEUDO -->
        <message :success="successMessage" :error="errorMessage"></message>
        <div class="field-body">
        <div class="columns">
          <div class="column">

            <div class="field">
              <label class="label">Tipo</label>
              <div class="control">
                <div class="select">
                  <select>
                    <option>Select</option>
                    <option v-for="option in tipoDeslocamentos" v-bind:value="option">{{ option.name }}</option>
                  </select>
                </div>
              </div>
            </div>

          </div>
          <div class="column">
            <div class="field">
              <label class="label">Data</label>
              <div class="control">
                <input v-model="dtDesloc" class="input" type="datetime-local" v-bind:value="dtDesloc" placeholder="Informe data">
              </div>
            </div>
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Km final</label>
              <div class="control">
                <input class="input" type="text" placeholder="Text input">
              </div>
            </div>
          </div>
          <div class="column">
            Fourth column
          </div>
        </div>
      
        </div>
      </div>
      

        </div>
        <!--#CONTEUDO -->
      </section>
      <footer class="modal-card-foot field is-grouped is-grouped-right">
        <button :class="isLoading ? 'button is-success is-loading' : 'button is-success'" v-on:click="saveItem()">Save</button>
        <button class="button" v-on:click="$emit('close')">Cancel</button>
      </footer>
    </div>
  </div>
</template>