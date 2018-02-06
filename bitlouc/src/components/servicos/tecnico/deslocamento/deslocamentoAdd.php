<template id="deslocamento-add">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Deslocamento: {{data.name}}, {{data.municipio}} /{{data.uf}}</p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <!--#CONTEUDO -->
        <message :success="successMessage" :error="errorMessage"></message>
        <div class="field is-horizontal">
          <div class="field-body">
            
            <div class="field">
              <label class="label">Data</label>
              <p class="control">
                <input v-model="dtDesloc" class="input" type="datetime-local" v-bind:value="dtDesloc" placeholder="Informe data">
              </p>
            </div>
            <div class="field">
              <label class="label">Status</label>
              <p class="control is-expanded has-icons-left has-icons-right">
                <div class="select">
                  <select>
                    <option>Select</option>
                    <option v-for="option in tipoDeslocamentos" v-bind:value="option">{{ option.name }}</option>
                  </select>
                </div>
              </p>
            </div>
            <div class="field">
              <label class="label">Tipo</label>
              <p class="control is-expanded has-icons-left has-icons-right">
                <div class="select">
                  <select>
                    <option>Select</option>
                    <option v-for="option in tipoDeslocamentos" v-bind:value="option">{{ option.name }}</option>
                  </select>
                </div>
              </p>
            </div>
          </div>
        </div>
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
            <label class="label">Tipo</label>
              <p class="control is-expanded has-icons-left">
                <input class="input" type="text" placeholder="Name">
                <span class="icon is-small is-left">
                  <i class="fas fa-user"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <label class="label">Tipo</label>
              <p class="control is-expanded has-icons-left has-icons-right">
                <div class="select">
                  <select>
                    <option>Select</option>
                    <option v-for="option in tipoDeslocamentos" v-bind:value="option">{{ option.name }}</option>
                  </select>
                </div>
              </p>
            </div>
          </div>
        </div>
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
          </div>
          
          <div class="columns">
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
                <label class="label">Km</label>
                <div class="control">
                  <input v-model="km" class="input" type="text" placeholder="Km">
                </div>
              </div>
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