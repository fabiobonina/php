<template id="geolocalizacao">
<transition name="modal" v-on:before-leave="beforeLeave">
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
            Local: {{data.name}}, {{data.municipio}} /{{data.uf}}
          </slot>
        </div>
          <div class="vue-modal-body">
         
            <slot name="body">
              Coordenadas atual: {{ data.latitude }}, {{ data.longitude }}
              <div>    
                <label for="inputEmail3" class="control-label">Novas coordenadas:</label>
                <div class="input-group">  
                  <input v-model="geolocalizacao" type="text" placeholder="Geolocalização" class="form-control">
                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
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