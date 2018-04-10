<template id="mod-add">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Deslocamento: {{data.tecnico.user}} </p>
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
              <p class="control">
                <v-select label="name" v-model="status" :options="deslocStatus"></v-select>
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
              <label class="label">Data Inicio</label>
              <p class="control">
                <input v-model="dtInicio" class="input" type="datetime-local">
              </p>
            </div>
            <div class="field">
              <label class="label">Km Inicio</label>
              <p class="control">
                <input v-model="kmInicio" :disabled="trajeto && trajeto.categoria > 0" class="input" type="number" >
              </p>
            </div>     
          </div>
        </div>
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Data Final</label>
              <p class="control">
                <input v-model="dtFinal" class="input" type="datetime-local" >
              </p>
            </div>
            <div class="field">
              <label class="label">Km Final</label>
              <p class="control">
                <input v-model="kmFinal" :disabled="trajeto && trajeto.categoria > 0" class="input" type="number">
              </p>
            </div>     
          </div>
        </div>
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Tempo</label>
              <div class="control">
                <input v-model="tempo" disabled class="input" type="number" placeholder="tempo">
              </div>
            </div>
            <div class="field">
              <label class="label">ValorHh</label>
              <div class="control">
                <input v-model="hhValor" disabled class="input" type="number" placeholder="Valor">
              </div>
            </div>
            <div class="field">
              <label class="label">Valor Trajeto</label>
              <div class="control">
                <input v-model="valor" :disabled="trajeto && trajeto.categoria != 1" class="input" type="number" placeholder="Valor">
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