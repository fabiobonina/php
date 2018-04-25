<template id="local-edt">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">{{loja.nick}} - Editar Local</p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <message :success="successMessage" :error="errorMessage"></message>
        <!--#CONTEUDO -->
        <div class="field">
          <p class="control has-icons-right">
            <input v-model="data.regional" class="input" type="text" placeholder="Regional">
            <span class="icon is-small is-right">
              <span class="mdi "></span>
            </span>
          </p>
        </div>
        <div class="field has-addons">
          <p class="control">
            <span class="select">
              <select v-model="data.tipo" class="form-control">
                <option v-for="option in tipos" v-bind:value="option.id">{{ option.name }}</option>
              </select>
            </span>
          </p>
          <p class="control is-expanded">
            <input v-model="data.name" class="input" type="text" placeholder="Nome*">
          </p>
        </div>

        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <p class="control is-expanded has-icons-left">
                <input v-model="data.municipio" class="input" type="text" placeholder="Municipio*">
                <span class="icon is-small is-left">
                  <i class="fas fa-user"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <p class="control is-expanded has-icons-right">
                <input v-model="data.uf" class="input" type="uf" placeholder="UF*">
                <span class="icon is-small is-right">
                  <i class="fas fa-check"></i>
                </span>
              </p>
            </div>
          </div>
        </div>


        <div class="field">
          <p class="control has-icons-right">
            <input v-model="coordenadas" class="input" type="text" placeholder="Coordenadas">
            <span class="icon is-small is-right">
              <span class="mdi mdi-map-marker"></span>
            </span>
          </p>
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
        <!--#CONTEUDO -->
      </section>
      <footer class="modal-card-foot field is-grouped is-grouped-right">
        <button class="button" v-on:click="$emit('close')">Cancel</button>
        <button :class="isLoading ? 'button is-info is-loading' : 'button is-info'" v-on:click="saveItem()">Save</button>
      </footer>
    </div>
  </div>
</template>