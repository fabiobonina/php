<template id="local-add">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Loja: {{data.nick}}</p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <!--#CONTEUDO -->
        <message :success="successMessage" :error="errorMessage"></message>
        <div class="form-horizontal">
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Tipo *</label>
            <div class="col-sm-10">
              <select v-model="tipo" class="form-control">
                <option v-for="option in tipos" v-bind:value="option.id">{{ option.name }}</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Regional</label>
            <div class="col-sm-10">
              <input v-model="regional" type="text" class="form-control" id="inputPassword3" placeholder="Regional">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Nome *</label>
            <div class="col-sm-10">
              <input v-model="name" type="text" class="form-control" id="inputPassword3" placeholder="Nome">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Municipio *</label>
            <div class="col-sm-10">
              <input v-model="municipio" type="text" class="form-control" id="inputPassword3" placeholder="municipio">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">UF *</label>
            <div class="col-sm-10">
              <input v-model="uf" type="text" class="form-control" id="inputPassword3" placeholder="UF">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Coordenadas</label>
            <div class="col-sm-10">
              <input v-model="coordenadas" type="text" class="form-control" id="inputPassword3" placeholder="Coordenadas">
            </div>
          </div>
        </div>
        <!--#CONTEUDO -->
      </section>
      <footer class="modal-card-foot field is-grouped is-grouped-right">
        <button class="button is-success" v-on:click="saveItem()">Save</button>
        <button class="button" v-on:click="$emit('close')">Cancel</button>
      </footer>
    </div>
  </div>
</template>