<template id="bem-add">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">{{ loja.nick }}: {{ local.tipo }} - {{ local.name }}</p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <!--#CONTEUDO -->
        <message :success="successMessage" :error="errorMessage"></message>
        <div class="form-horizontal">
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Produto*</label>
            <div class="col-sm-10">
              <select v-model="produto" class="form-control">
                <option v-for="option in produtos" v-bind:value="option">{{ option.name }}</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Modelo*</label>
            <div class="col-sm-10">
              <input v-model="modelo" type="text" class="form-control" id="inputPassword3" placeholder="Modelo">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Numeração</label>
            <div class="col-sm-10">
              <input v-model="numeracao" type="text" class="form-control" id="inputPassword3" placeholder="Numeração">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Fabricante*</label>
            <div class="col-sm-10">
              <select v-model="fabricante" class="form-control">
                <option v-for="option in fabricantes" v-bind:value="option">{{ option.name }}</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Categ. *</label>
            <div class="col-sm-10">
              <select v-model="categoria" class="form-control">
                <option v-for="option in categorias" v-bind:value="option">{{ option.name }}</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Plaqueta</label>
            <div class="col-sm-10">
              <input v-model="plaqueta" type="text" class="form-control" id="inputPassword3" placeholder="plaqueta">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Dt.Fabrib.</label>
            <div class="col-sm-10">
              <input v-model="dataFab" type="date" class="form-control" id="inputPassword3" placeholder="Data Fabricaçao">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Dt.Compra*</label>
            <div class="col-sm-10">
              <input v-model="dataCompra" type="date" class="form-control" id="inputPassword3" placeholder="Data compra">
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