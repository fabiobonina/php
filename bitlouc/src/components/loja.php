
    <template id="loja">
    <div>
      <!-- /.row -->
      <h2 class="page-header">Loja</h2>
      <!--div class="pull-left">
        <a href="#/" class="btn btn-default btn-flat"> <i class="fa fa-long-arrow-left"></i> VOLTAR</a>
      </div-->
      <a href="#/" class="btn btn-app">
        <i class="fa fa-long-arrow-left"></i> VOLTAR
      </a>
      <div class="row">
        <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-aqua-active">
            <h3 class="widget-user-username">{{ dados.displayName }}<span class="pull-right badge bg-blue">
                  Locais: <i class="fa fa-fw fa-building-o"></i> {{ dados.locaisQt }} /<i class="fa fa-fw fa-map-marker"></i> {{ dados.locaisGeoStatus }}% ({{ dados.locaisGeoQt }})</span></h3>
            <h5 class="widget-user-desc">Nome: {{ dados.name }}</h5>
            <h5 class="widget-user-desc">Seguimento: {{ dados.seguimento }}
            <div class="pull-right box-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input v-model="searchQuery" name="table_search" class="form-control pull-right" placeholder="Search">
                <span class="input-group-btn">
                    <button class="btn btn-teal btn-flat"> <i class="fa fa-building"></i></button>
                  </span>
              </div>
              
            </div></h5>
            
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
        </div>
        <!-- /.widget-user -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <grid-local
        :data="dados.locais"
        :columns="gridColumns"
        :filter-key="searchQuery">
      </grid-local>        
    </div>
  </template>