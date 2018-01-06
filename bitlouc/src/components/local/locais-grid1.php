<template id="grid-local">
  <div>
    <!-- PRODUCT LIST -->
    <!-- /.box-header -->
    <div class="box-body">
    
      <ul class="products-list product-list-in-box">
        <li class="item"  v-for="entry in filteredData">
          <!--div class="product-img">
            <img src="dist/img/default-50x50.gif" alt="Product Image">
          </div-->
          <div class="product-info">
            <a :href="'#/loja/' + $route.params._id + '/local/' + entry.id" class="product-title">{{entry.name}}
            <span class="pull-right badge" v-for="categoria in entry.categoria">{{ categoria.tag }}</span>
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
      <geolocalizacao v-if="showModal" v-on:close="onClose"  :data="modalItem"></geolocalizacao>
    </div>
    <!-- /.box-body -->
    <!-- /.box-footer -->
    <div class="card" v-for="entry in filteredData">
      <header class="card-header">
        <a :href="'#/loja/' + $route.params._id + '/local/' + entry.id" class="card-header-title">{{entry.tipo}} - {{entry.name}}
            <span class="badge" v-for="categoria in entry.categoria">{{ categoria.tag }}</span>
            </a>
        <a href="#" class="card-header-icon" aria-label="more options">
          <span class="icon">
            <i class="fa fa-angle-down" aria-hidden="true"></i>
          </span>
        </a>
      </header>
      <div class="card-content">
        <div class="content">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.
          <a href="#">@bulmaio</a>. <a href="#">#css</a> <a href="#">#responsive</a>
          <br>
          <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
        </div>
      </div>
      <footer class="card-footer">
        <a href="#" class="card-footer-item">Save</a>
        <a href="#" class="card-footer-item">Edit</a>
        <a href="#" class="card-footer-item">Delete</a>
      </footer>
    </div>
  </div>
</template>