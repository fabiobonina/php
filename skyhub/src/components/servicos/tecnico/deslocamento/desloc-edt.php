<template id="desloc-edt">
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
        <!--#INICIO -->
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Status</label>
              <p class="control is-expanded has-icons-left has-icons-right">
                <div class="select">
                  <select v-model="status">
                    <option>Select</option>
                    <option v-for="option in statusDeslocamentos" v-bind:value="option">{{ option.name }}</option>
                  </select>
                </div>
              </p>
            </div>
            <div class="field">
              <label class="label">Data Inicio</label>
              <p class="control">
                <input v-model="dtInicio" class="input" type="datetime-local" v-bind:value="dtInicio" placeholder="Informe data">
              </p>
            </div>            
          </div>
        </div>
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Tipo Trajeto</label>
              <p class="control is-expanded has-icons-left has-icons-right">
                <div class="select">
                  <select v-model="tipo">
                    <option>Select</option>
                    <option v-for="option in tipoDeslocamentos" v-bind:value="option">{{ option.name }}</option>
                  </select>
                </div>
              </p>
            </div>
            <div v-if="tipo.categoria == 0 "class="field">
              <label class="label">Km</label>
              <div class="control">
                <input v-model="km" class="input" type="text" placeholder="Km">
              </div>
            </div>
            <div v-if="tipo.categoria == 1 "class="field">
              <label class="label">Valor</label>
              <div class="control">
                <input v-model="valor" class="input" type="text" placeholder="Valor">
              </div>
            </div>
          </div>
        </div>
        <!--#INICIO -->
        <!--#FINAL -->
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Status Final</label>
              <p class="control is-expanded has-icons-left has-icons-right">
                <div class="select">
                  <select v-model="statusFinal">
                    <option>Select</option>
                    <option v-for="option in statusDeslocamentos" v-bind:value="option">{{ option.name }}</option>
                  </select>
                </div>
              </p>
            </div>
            <div class="field">
              <label class="label">Data Final</label>
              <p class="control">
                <input v-model="dtFinal" class="input" type="datetime-local" v-bind:value="dtFinal" placeholder="Informe data">
              </p>
            </div>            
          </div>
        </div>
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Tipo Trajeto</label>
              <p class="control is-expanded has-icons-left has-icons-right">
                <div class="select">
                  <select v-model="tipo">
                    <option>Select</option>
                    <option v-for="option in tipoDeslocamentos" v-bind:value="option">{{ option.name }}</option>
                  </select>
                </div>
              </p>
            </div>
            <div v-if="tipo.categoria == 0 "class="field">
              <label class="label">Km</label>
              <div class="control">
                <input v-model="kmFinal" class="input" type="text" placeholder="Km">
              </div>
            </div>
            <div v-if="tipo.categoria == 1 "class="field">
              <label class="label">Valor</label>
              <div class="control">
                <input v-model="valor" class="input" type="text" placeholder="Valor">
              </div>
            </div>
          </div>
        </div>
        <!--#FINAL -->
        <!--#CONTEUDO -->
      </section>
      <footer class="modal-card-foot field is-grouped is-grouped-right">
        <button :class="isLoading ? 'button is-success is-loading' : 'button is-success'" v-on:click="saveItem()">Save</button>
        <button class="button" v-on:click="$emit('close')">Cancel</button>
      </footer>
    </div>
  </div>
</template>