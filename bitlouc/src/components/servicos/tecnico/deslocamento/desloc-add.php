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
        <label class="label">Status</label>
        <div class="tabs is-toggle is-fullwidth is-small">
          <ul >
            <li v-for="item in deslocStatus" :class="status && status.id == item.id ? 'is-active' : ''" >
              <a  @click="status = item" >
                <span>{{item.name }}</span>
              </a>
            </li>
          </ul>
        </div>
        <label class="label">Tipo Trajeto</label>
        <div class="tabs is-toggle is-fullwidth is-small">
          <ul >
            <li v-for="item in deslocTrajetos" :class="trajeto && trajeto.id == item.id ? 'is-active' : ''" >
              <a  @click="trajeto = item" >
                <span>{{item.name }}</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Data</label>
              <p class="control">
                <input v-model="date" class="input" type="datetime-local"  placeholder="Informe data">
              </p>
            </div>
            <div class="field">
              <label class="label">Tecnico</label>
              <p class="control">
                <v-select label="userNick" v-model="tecnico" :options="data.tecnicos"></v-select>
              </p>
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
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Km</label>
              <div class="control">
                <input v-model="km" class="input" :disabled="trajeto && trajeto.categoria > 0" type="number" placeholder="Km">
              </div>
            </div>
            <div class="field">
              <label class="label">Valor</label>
              <div class="control">
                <input v-model="valor" class="input" :disabled="trajeto && trajeto.categoria != 1" type="number" placeholder="Valor">
              </div>
            </div>    
          </div>
        </div>
        
        <br>
        <br>
        <br>     
        <!--#FINAL -->
        <!--#CONTEUDO -->
      </section>
      <footer class="modal-card-foot field is-grouped is-grouped-right">
        <button class="button" v-on:click="$emit('close')">Cancel</button>
        <button :class="isLoading ? 'button is-info is-loading' : 'button is-info'" v-on:click="saveItem()">Save</button>
      </footer>
    </div>
  </div>
</template>
<script src="src/components/servicos/tecnico/deslocamento/desloc-add.js"></script>