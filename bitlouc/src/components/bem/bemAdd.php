<template id="bem-add">
<transition name="modal">
  <div class="vue-modal-mask">
    <div class="vue-modal-wrapper">
      <div class="vue-modal-container">
        <div class="box-body">
          <div v-if="temErros" class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <p v-for="message in errorMessage">{{ message }}</p>
          </div>
          <div v-if="temMessage"class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> OK!</h4>
            <p v-for="message in successMessage">{{ message }}</p>
          </div>
        </div>
        <div class="vue-modal-header">
          <slot name="header">
          {{ loja.nick }}: {{ local.tipo }} - {{ local.name }}
          </slot>
        </div>
          <div class="vue-modal-body">
            <slot name="body">
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
            </slot>
          </div>
          <div class="vue-modal-footer">
            <slot name="footer">
              <button class="btn btn-default vue-modal-default-button" v-on:click="saveItem()">OK</button>
              <button class="btn btn-danger" v-on:click="$emit('close')">Cancel</button>
            </slot>
          </div>
      </div>
      
    </div>
    <div class="overlay" v-if="isLoading">
        <i class="fa fa-refresh fa-spin"></i>
      </div>
  </div>
</transition>
</template>