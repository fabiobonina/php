<template id="desloc-add">
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
          <div class="field-label">
            <label class="label">Data</label>
          </div>
          <div class="field-body">
            <div class="field has-addons">
              <p class="control">
                <a class="button is-static">
                  <span class="mdi mdi-calendar-clock"></span>
                </a>
              </p>
              <p class="control">
                <input v-model="date" class="input" type="datetime-local"  placeholder="Informe data">
              </p>
            </div>
          </div>
        </div>
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Tecnico</label>
              <p class="control">
                <v-select label="userNick" v-model="tecnico" :options="data.tecnicos"></v-select>
              </p>
            </div>
            <div class="field">
              <label class="label">Tipo Trajeto</label>
              <p class="control">
                <v-select label="name" v-model="trajeto" :options="deslocTrajetos"></v-select>
              </p>
            </div>     
          </div>
        </div>
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Status</label>
              <p class="control">
                <v-select label="name" v-model="status" :options="deslocStatus"></v-select>
              </p>
            </div>
            <div v-if="trajeto != null && trajeto.categoria == 0" class="field">
              <label class="label">Km</label>
              <div class="control">
                <input v-model="km" class="input" type="text" placeholder="Km">
              </div>
            </div>
            <div v-if="trajeto != null &&  trajeto.categoria == 1 "class="field">
              <label class="label">Valor</label>
              <div class="control">
                <input v-model="valor" class="input" type="text" placeholder="Valor">
              </div>
            </div>    
          </div>
        </div>
        <div v-if="trajeto != null && trajeto.categoria == 0" class="field is-horizontal">
          <div class="field-label">
            <label class="label">Outros Tecnicos</label>
          </div>
          <div class="field-body">
            <div class="field has-addons">
              <p class="control">
                <a class="button is-static">
                  <span class="mdi mdi-worker"></span>
                </a>
              </p>
              <p class="control">
                <v-select multiple label="userNick" v-model="tecnicos" :options="data.tecnicos"></v-select>
              </p>
            </div>
          </div>
        </div>
        <br>
        <br>
        <br>
        <!--#INICIO -->
        <!--#FINAL ->
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
                  <select v-model="trajeto">
                    <option>Select</option>
                    <option v-for="option in trajetoDeslocamentos" v-bind:value="option">{{ option.name }}</option>
                  </select>
                </div>
              </p>
            </div>
            <div v-if="trajeto.categoria == 0 "class="field">
              <label class="label">Km</label>
              <div class="control">
                <input v-model="kmFinal" class="input" type="text" placeholder="Km">
              </div>
            </div>
            <div v-if="trajeto.categoria == 1 "class="field">
              <label class="label">Valor</label>
              <div class="control">
                <input v-model="valor" class="input" type="text" placeholder="Valor">
              </div>
            </div>
          </div>
        </div>
        <! - -#FINAL -->
        <!--#CONTEUDO -->
      </section>
      <footer class="modal-card-foot field is-grouped is-grouped-right">
        <button class="button" v-on:click="$emit('close')">Cancel</button>
        <button :class="isLoading ? 'button is-info is-loading' : 'button is-info'" v-on:click="saveItem()">Save</button>
      </footer>
    </div>
  </div>
</template>