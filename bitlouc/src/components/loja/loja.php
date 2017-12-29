
<template id="loja">
  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><a href="#" class="btn"><router-link to="/"><i class="fa fa-arrow-left"></i></router-link></a>Loja<small> dados</small></h1>
      <ol class="breadcrumb">
        <li><a><router-link to="/"><i class="fa fa-dashboard"></i> Home</router-link></a></li>
        <li class="active">Loja</li>
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
                  <h3 class="widget-user-username">{{ loja.nick }}<span class="pull-right badge bg-blue">
                        Locais: <i class="fa fa-fw fa-building-o"></i> {{ loja.locaisQt }} /<i class="fa fa-fw fa-map-marker"></i> {{ loja.locaisGeoStatus }}% ({{ loja.locaisGeoQt }})</span></h3>
                  <h5 class="widget-user-desc">Nome: {{ loja.name }}</h5>
                  <h5 class="widget-user-desc">Seguimento: {{ loja.seguimento }}
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
                  <a v-on:click="modalLocalAdd = true" class="btn btn-app"><i class="fa fa-building-o"></i> LOCAL</a>
                  <a v-on:click="modalLocalAdd = true" class="btn btn-app">
                    <span class="glyphicon glyphicon-qrcode"></span>
                    <span class="glyphicon-class">Local</span>
                  </a>
                </div>
                <div class="tabs is-boxed">
                  <ul>
                    <li :class="active==1 ? 'is-active' : ''" @click="active=1">
                      <a>
                        <span class="icon is-small"><i class="fa fa-image"></i></span>
                        <span>Pictures</span>
                      </a>
                    </li>
                    <li :class="active==2 ? 'is-active' : ''" @click="active=2">
                      <a>
                        <span class="icon is-small"><i class="fa fa-music"></i></span>
                        <span>Music</span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="icon is-small"><i class="fa fa-film"></i></span>
                        <span>Videos</span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="icon is-small"><i class="fa fa-file-text-o"></i></span>
                        <span>Documents</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            <!-- /.widget-user -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <nav class="panel" v-if="active==1">
            <p class="panel-heading">
              repositories
            </p>
            <div class="panel-block">
              <p class="control has-icons-left">
                <input class="input is-small" type="text" placeholder="search">
                <span class="icon is-small is-left">
                  <i class="fa fa-search"></i>
                </span>
              </p>
            </div>
            <p class="panel-tabs">
              <a class="is-active">all</a>
              <a>public</a>
              <a>private</a>
              <a>sources</a>
              <a>forks</a>
            </p>
            <a class="panel-block is-active">
              <span class="panel-icon">
                <i class="fa fa-book"></i>
              </span>
              bulma
            </a>
            <a class="panel-block">
              <span class="panel-icon">
                <i class="fa fa-code-fork"></i>
              </span>
              mojs
            </a>
            <label class="panel-block">
              <input type="checkbox">
              remember me
            </label>
            <div class="panel-block">
              <button class="button is-link is-outlined is-fullwidth">
                reset all filters
              </button>
            </div>
          </nav>
          <grid-local
            :data="locais"
            :columns="gridColumns"
            :filter-key="searchQuery">
          </grid-local>
          <local-add v-if="modalLocalAdd" v-on:close="modalLocalAdd = false" :data="loja" @atualizar="onAtualizar"></local-add>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
      <!-- /.content -->
  </div>
</template>