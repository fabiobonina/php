<template id="bens-grid">
  <div>
    <!-- PRODUCT LIST -->
    <!-- /.box-header -->
    <div class="box-body">
          <div>
            <label><input type="radio" v-model="selectedGrupo" value="All" /> All </label>
            <label v-for=" grupo in grupos"><input type="radio" v-model="selectedGrupo" v-bind:value="grupo.id" />{{ grupo.name }} </label>
          </div>
    
      <ul class="products-list product-list-in-box">
        <li class="item"  v-for="entry in filteredData">
          <!--div class="product-img">
            <img src="dist/img/default-50x50.gif" alt="Product Image">
          </div-->
          <div class="product-info">
            <a :href="'#/loja/' + $route.params._id + '/local/' + entry.id" class="product-title">{{entry.name}}
            <span class="pull-right badge" v-for="grupo in entry.grupos">{{ grupo.tag }}</span>
            </a>
            <span class="product-description">{{entry.tipo}}
              <a v-if=" 0.000000 != entry.latitude" :href="'https://maps.google.com/maps?q='+ entry.latitude + '%2C' + entry.longitude" target="_blank">
                <span class="pull-right blue--text text--lighten-1"><i class="fa fa-fw fa-map"></i> Como chegar</span>
              </a>
              <div>
                <button v-on:click="showModal = true; selecItem(entry)" class=" pull-right btn btn-default btn-xs">Geoposição</button>
              </div>
            </span>
          </div>
        </li>
        <!-- /.item -->
      </ul>
      <!--geolocalizacao v-if="showModal" v-on:close="onClose"  :data="modalItem"></geolocalizacao-->
    </div>
    <!-- /.box-body -->
    <!-- /.box-footer -->
  </div>
</template>