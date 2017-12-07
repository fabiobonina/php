<template id="grid-local">
  <div>
    <!-- PRODUCT LIST -->
    <!-- /.box-header -->
    <div class="box-body">
      <ul class="products-list product-list-in-box">
        <li class="item"  v-for="entry in filteredData">
          <div class="product-img">
            <img src="dist/img/default-50x50.gif" alt="Product Image">
          </div>
          <div class="product-info">
            <a :href="'#/loja/' + entry.id" class="product-title">{{entry.name}}
              <span class="pull-right badge bg-blue">Locais: 
                <i class="fa fa-fw fa-building-o"></i> {{ }} /<i class="fa fa-fw fa-map-marker"></i> {{  }}% ({{ }})
              </span>
            </a>
            <span class="product-description">{{entry.name}} <span class="pull-right badge" v-for="produto in entry.produtos">{{ }}</span>
              <a v-if=" 0.000000 == entry.latitude" :href="'https://maps.google.com/maps?q='+ entry.latitude + '%2C' + entry.longitude" target="_blank">
                <span class="pull-right blue--text text--lighten-1"><i class="fa fa-fw fa-map"></i> {{entry.latitude.length}} Como chegar</span>
              </a>
              <a v-if=" 0.000000 != entry.latitude" :href="'https://maps.google.com/maps?q='+ entry.latitude + '%2C' + entry.longitude" target="_blank">
                <span class="pull-right blue--text text--lighten-1"><i class="fa fa-fw fa-map"></i> {{entry.latitude}} Como chegar</span>
              </a>
              <div>
                <button v-on:click="showModal = true; selecItem(entry)"class=" pull-right btn btn-default btn-xs">Show Modal</button>
              </div>
            </span>
          </div>
        </li>
        <!-- /.item -->
      </ul>
      <modal-component v-if="showModal" v-on:close="onClose"  :data="modalItem"  :acivated="modalVisible"></modal-component>
    </div>
    <!-- /.box-body -->
    <!-- /.box-footer -->
  </div>
</template>