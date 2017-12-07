<template id="modal-component">
<transition name="modal" v-on:before-leave="beforeLeave">
  <div class="vue-modal-mask">
    <div class="vue-modal-wrapper">
      <div class="vue-modal-container">
        <div class="vue-modal-header">
          <slot name="header">
            Local: {{data.name}}, {{data.municipio}} /{{data.uf}}
          </slot>
        </div>
        <div class="vue-modal-body">
          <slot name="body">
            Cordenadas atual: {{ data.latitude }}, {{ data.longitude }}
            <div class="input-group input-group-sm" style="width: 150px;">
                  <input v-model="searchQuery" name="table_search" class="form-control pull-right" placeholder="Search">
                  <span class="input-group-btn">
                      <button class="btn btn-teal btn-flat"> <i class="fa fa-building"></i></button>
                    </span>
                </div>
                <form action="#" class="form-horizontal" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      
                      <input  v-model="geolocalizacao" type="text" name="geolocalizacao" class="form-control" placeholder="Geolocalização">
                      <span class="form-control-feedback"><i class="fa fa-map-marker"></i></span>
                    </div>
                  </div>
                </div>

                  <div class="form-group has-feedback">
                    <input  v-model="geolocalizacao" type="text" name="geolocalizacao" class="form-control" placeholder="Geolocalização">
                    <span class="form-control-feedback"><i class="fa fa-map-marker"></i></span>
                  </div>
                  <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                      <button type="submit" name="logar" class="btn btn-primary btn-block btn-flat">Salvar</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>
          </slot>
        </div>
        <div class="vue-modal-footer">
          <slot name="footer">
            <button class="btn btn-default vue-modal-default-button" v-on:click="$emit('close')">OK</button>
            <button class="btn btn-danger" v-on:click="$emit('close')">Cancel</button>
          </slot>
        </div>
      </div>
    </div>
  </div>
</transition>
</template>