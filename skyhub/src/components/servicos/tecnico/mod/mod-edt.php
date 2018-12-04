<template id="mod-edt">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Deslocamento: {{data.tecnico.userNick}} </p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <!--#CONTEUDO -->
        <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
        <!--#INICIO -->
        <label class="label">Status</label>
        <div class="tabs is-toggle is-fullwidth is-small">
          <ul >
            <li v-for="item in deslocStatus" :class="data.status && data.status.id == item.id ? 'is-active' : ''" >
              <a  @click="data.status = item" >
                <span>{{item.name }}</span>
              </a>
            </li>
          </ul>
        </div>
        <label class="label">Tipo Trajeto</label>
        <div class="tabs is-toggle is-fullwidth is-small">
          <ul >
            <li v-for="item in deslocTrajetos" :class="data.trajeto && data.trajeto.id == item.id ? 'is-active' : ''" >
              <a  @click="data.trajeto = item" >
                <span>{{item.name }}</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Data Inicio</label>
              <p class="control">
                <input v-model="data.dtInicio" class="input" type="datetime-local">
              </p>
            </div>
            <div class="field">
              <label class="label">Km Inicio</label>
              <p class="control">
                <input v-model="data.kmInicio" :disabled="data.trajeto.categoria > 0" class="input" type="number" >
              </p>
            </div>     
          </div>
        </div>
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Data Final</label>
              <p class="control">
                <input v-model="data.dtFinal" class="input" type="datetime-local" >
              </p>
            </div>
            <div class="field">
              <label class="label">Km Final</label>
              <p class="control">
                <input v-model="data.kmFinal" :disabled="data.trajeto.categoria > 0" class="input" type="number">
              </p>
            </div>     
          </div>
        </div>
        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <label class="label">Tempo</label>
              <div class="control">
                <input v-model="data.tempo" disabled class="input" type="number" placeholder="tempo">
              </div>
            </div>
            <div class="field">
              <label class="label">ValorHh</label>
              <div class="control">
                <input v-model="data.hhValor" disabled class="input" type="number" placeholder="Valor">
              </div>
            </div>
            <div class="field">
              <label class="label">Valor Trajeto</label>
              <div class="control">
                <input v-model="data.valor" :disabled="data.trajeto.categoria != 1" class="input" type="number" placeholder="Valor">
              </div>
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