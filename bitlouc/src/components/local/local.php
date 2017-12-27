<template id="local">
  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><a class="btn"><router-link :to="'/loja/' + $route.params._id"><i class="fa fa-arrow-left"></i></router-link></a>
        Local<small>dados</small>
      </h1>
      <ol class="breadcrumb">
        <li><a><router-link to="/"><i class="fa fa-dashboard"></i> Home</router-link></a></li>
        <li><a><router-link :to="'/loja/' + $route.params._id"> Loja</router-link></a></li>
        <li class="active">Local</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-body">      
          <div class="row">
            <div class="col-md-12">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                  <h3 class="widget-user-username">{{ loja.nick }}: {{ local.tipo }} - {{ local.name }}<span class="pull-right badge bg-blue">
                        Locais: <i class="fa fa-fw fa-building-o"></i> {{ }} /<i class="fa fa-fw fa-map-marker"></i> {{  }}% ({{ }})</span></h3>
                  <h5 class="widget-user-desc">{{ local.municipio }}/ {{ local.uf }}</h5>
                  <h5 class="widget-user-desc">Seguimento: {{  }}
                    <div class="pull-right box-tools">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <input v-model="searchQuery" name="table_search" class="form-control pull-right" placeholder="Search">
                        <span class="input-group-btn">
                          <button class="btn btn-teal btn-flat"> <i class="fa fa-building"></i></button>
                        </span>
                      </div>
                    </div>
                  </h5>
                </div>
                <!--div class="widget-user-image">
                  <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
                </div-->
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-3 border-right">
                      <div class="description-block">
                        <h5 class="description-header">3,200</h5>
                        <span class="description-text">SALES</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 border-right">
                      <div class="description-block">
                        <h5 class="description-header">13,000</h5>
                        <span class="description-text">FOLLOWERS</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 border-right">
                      <div class="description-block">
                        <h5 class="description-header">13,000</h5>
                        <span class="description-text">FOLLOWERS</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3">
                      <div class="description-block">
                        <h5 class="description-header">35</h5>
                        <span class="description-text">PRODUCTS</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <div class="box-footer">
                  <a v-on:click="modalBemAdd = true" class="btn btn-app">
                    <span class="glyphicon glyphicon-qrcode"></span>
                    <span class="glyphicon-class">Bem</span>
                  </a>
                  <!-- /.row -->
                </div>
              </div>
              <!-- /.widget-user -->
            </div>
            <!-- /.col -->
            <bens-grid
            :data="bens"
            :categorias="local.categoria"
            :filter-key="searchQuery">
            </bens-grid>
            <bem-add v-if="modalBemAdd" v-on:close="onClose"  :data="modalItem"></bem-add>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
      <!-- /.content -->
  </div>
</template>