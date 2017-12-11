<template id="local-add">
<transition name="modal">
  <div class="vue-modal-mask">
    <div class="vue-modal-wrapper">
      <div class="vue-modal-container">
        <div class="box-body">
          <div v-if="temErros" class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
               <p v-for="error in errors">{{ error }}</p>
          </div>
        </div>
        <div class="vue-modal-header">
          <slot name="header">
            Loja: {{data.name}}
          </slot>
        </div>
          <div class="vue-modal-body">
         
            <slot name="body">
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