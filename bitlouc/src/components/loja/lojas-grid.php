<template id="grid-lojas">
<div>
  <!-- PRODUCT LIST -->
    <!-- /.box-header -->
    <div class="box-body">
    <div class="box-header with-border">
      <h3 class="box-title">Lojas</h3>
    </div>
      <ul class="products-list product-list-in-box">
        <li class="item"  v-for="entry in filteredData">
          <div class="product-img">
            <img src="dist/img/default-50x50.gif" alt="Product Image">
          </div>
          <div class="product-info">
            <a :href="'#/loja/' + entry.id" class="product-title">{{entry.nick}}
            <span class="pull-right badge bg-blue">
              Locais: <i class="fa fa-fw fa-building-o"></i> {{ entry.locaisQt }} /<i class="fa fa-fw fa-map-marker"></i> {{ entry.locaisGeoStatus }}% ({{ entry.locaisGeoQt }})</span></a>
            <span class="product-description">{{entry.name}} <span class="pull-right badge" v-for="categoria in entry.categoria">{{ categoria.tag }}</scategoriaspan> 
          </div>
        </li>
        <!-- /.item -->
      </ul>
    </div>
    <!-- /.box-body -->
    <!-- /.box-footer -->

  <!--div class="list-group" v-for="entry in filteredData">
    <a :href="'#/loja/' + entry.loja.id" class="list-group-item"><h4 class="list-group-item-heading">{{entry.loja.nick}}</h4>
      <p class="list-group-item-text">{{entry.loja.name}}</p><span class="glyphicon glyphicon-eye-open"></span>{{entry.locais.length}} View <span class="glyphicon glyphicon-eye-open"></span>
    </a>
  </div-->
  
</div>
</template>