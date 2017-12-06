<!-- Full Width Column -->
<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Top Navigation
      <small>Example 2.0</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Layout</a></li>
      <li class="active">Top Navigation</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!--div class="callout callout-info">
      <h4>Tip!</h4>

      <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a
        sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular
        links instead.</p>
    </div>
    <div class="callout callout-danger">
      <h4>Warning!</h4>

      <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
        and the content will slightly differ than that of the normal layout.</p>
    </div-->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Configuração</h3>
      </div>
      <div class="box-body">
        <main id="app">
          <router-view></router-view>
        </main>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- footer content -->
    <?php include("src/components/geolocalizacao.php");?>
    <!-- /footer content -->
    <!-- footer content -->
    <?php include("src/components/tabela-grid.php");?>
    <!-- /footer content -->
        
    <template id="list">
      <div>
        <div class="actions">
          <a class="btn btn-default" >
          <router-link :to="{path: '/add'}">
            <span class="glyphicon glyphicon-plus"></span>
            Add
          </router-link>
          </a>
        </div>
        <div>
          <p class="successMessage" v-if="successMessage">{{successMessage}}</p>
          <p class="errorMessage" v-if="errorMessage">{{errorMessage}}</p>
          <div class="filters row">
            <div class="form-group col-sm-3">
              <label for="search-element">Search</label>
              <input v-model="searchQuery" class="form-control" id="search-element" requred/>
            </div>
          </div>
          <tabela-grid
            :data="dados"
            :columns="gridColumns"
            :filter-key="searchQuery">
          </tabela-grid>
        </div>
      </div>
    </template>

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
        <div class="container">
      <button id="show-modal" v-on:click="showModal = true" class="btn btn-primary">Show Modal</button>
      </div>
        <modal-component v-if="showModal" v-on:close="onClose" :acivated="modalVisible"></modal-component>

        <div class="row">
          <div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">{{ dados.displayName }}<span class="pull-right badge bg-blue">
                    Locais: <i class="fa fa-fw fa-building-o"></i> {{ dados.locaisQt }} /<i class="fa fa-fw fa-map-marker"></i> {{ dados.locaisGeoStatus }}% ({{ dados.locaisGeoQt }})</span></h3>
              <h5 class="widget-user-desc">Nome: {{ dados.name }}</h5>
              <h5 class="widget-user-desc">Seguimento: {{ dados.seguimento }}</h5>
              
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
              <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                  <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span> </a></li>
                  <li class="item"  >
                  <div class="row">
                    <div class="col-xs-10">
                      <a href="#">Tasks <span class="pull-right badge bg-blue">33</span></a>
                    </div>

                    <div class="pull-right col-xs-2">
                      <a href="#" class="btn btn-default btn-flat">Profile <span class="pull-right badge bg-aqua">5</span></a>
                    </div>
                    </div>
                  </li>
                  <li v-for="entry in dados.locais">
                    <a :href="'#/loja/' + dados.id + '/local/'+ entry.id">{{entry.name}}
                      <a v-if=" 1 < entry.latitude.length" :href="'https://maps.google.com/maps?q='+ entry.latitude + '%2C' + entry.longitude" target="_blank">
                        <span class="blue--text text--lighten-1">near_me</span>
                      </a>
                      <p class="grey--text text--lighten-1" v-if=" 1 > entry.latitude.length" >location_off</p><span class="pull-right badge bg-green">12</span>
                      <br><span class="product-description">{{}}</span>
                    </a>
                  </li>
                  <li><a href="#">Followers <span class="pull-right badge bg-red">842</span><br><span class="product-description">{{}}</span></a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /.widget-user -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <br/>
        <ul class="products-list product-list-in-box">
          <li class="item"  v-for="entry in dados.locais">
            <div class="product-info">
              <a :href="'#/loja/' + dados.id + '/local/'+ entry.id" class="product-title">{{entry.name}}
                <span class="label label-warning pull-right">Lacalidades: {{}}</span></a>
              <span class="product-description">{{entry.name}}</span>
            </div>
          </li>
          <!-- /.item -->
        </ul>
        <ul class="products-list product-list-in-box">
          <li class="item"  v-for="entry in dados.locais">
            <div class="product-img">
              <img src="dist/img/default-50x50.gif" alt="Product Image">
            </div>
            <div class="product-info">
              <a :href="'#/loja/' + entry.id" class="product-title">{{entry.name}}
              <span class="pull-right badge bg-blue">
                Locais: <i class="fa fa-fw fa-building-o"></i> {{ }} /<i class="fa fa-fw fa-map-marker"></i> {{  }}% ({{ }})</span></a>
              <span class="product-description">{{entry.name}} <span class="pull-right badge" v-for="produto in entry.produtos">{{ }}</span></span> 
            </div>
          </li>
          <!-- /.item -->
        </ul>
        
      </div>
    </template>
              
    <template id="local">
      <div>
        <h2>Local product</h2>
        <h2>{{ product}}</h2>
        <!--form v-on:submit="updateProduct">
          <div class="form-group">
            <label for="edit-name">Name</label>
            <input class="form-control" id="edit-name" v-model="product.name" required/>
          </div>
          <div class="form-group">
            <label for="edit-description">Description</label>
            <textarea class="form-control" id="edit-description" rows="3" v-model="product.description"></textarea>
          </div>
          <div class="form-group">
            <label for="edit-price">Price, <span class="glyphicon glyphicon-euro"></span></label>
            <input type="number" class="form-control" id="edit-price" v-model="product.price"/>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
          <a class="btn btn-default"><router-link to="/">Cancel</router-link></a>
        </form-->
      </div>
    </template>

    

    
        
    <template id="add">
      <div>
      <h2>Add new product</h2>
      <form v-on:submit="createProduct">
        <div class="form-group">
          <label for="add-name">Name</label>
          <input class="form-control" id="add-name" v-model="product.name" required/>
        </div>
        <div class="form-group">
          <label for="add-description">Description</label>
          <textarea class="form-control" id="add-description" rows="10" v-model="product.description"></textarea>
        </div>
        <div class="form-group">
          <label for="add-price">Price, <span class="glyphicon glyphicon-euro"></span></label>
          <input type="number" class="form-control" id="add-price" v-model="product.price"/>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a class="btn btn-default"><router-link to="/">Cancel</router-link></a>
      </form>
      </div>
    </template>
        
    <template id="edit">
      <div>
      <h2>Edit product</h2>
      <form v-on:submit="updateProduct">
        <div class="form-group">
          <label for="edit-name">Name</label>
          <input class="form-control" id="edit-name" v-model="product.name" required/>
        </div>
        <div class="form-group">
          <label for="edit-description">Description</label>
          <textarea class="form-control" id="edit-description" rows="3" v-model="product.description"></textarea>
        </div>
        <div class="form-group">
          <label for="edit-price">Price, <span class="glyphicon glyphicon-euro"></span></label>
          <input type="number" class="form-control" id="edit-price" v-model="product.price"/>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn btn-default"><router-link to="/">Cancel</router-link></a>
      </form>
      </div>
    </template>

    <template id="delete">
      <div>
      <h2>Delete product {{ product.name }}</h2>
      <form v-on:submit="deleteProduct">
        <p>The action cannot be undone.</p>
        <button type="submit" class="btn btn-danger">Delete</button>
        <a class="btn btn-default"><router-link to="/">Cancel</router-link></a>
      </form>
      </div>
    </template>

    <template id="naoEncrontrado">
      <h2>No encuentro: 404</h2>
    </template>
  </section>
  <!-- /.content -->
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->

    
    <script src="lib/vue.js"></script>
    <script src="lib/vuex.js"></script>
    <script src="lib/vue-router.js"></script>
    <script src="lib/vue-resource.js"></script>
    <script src="appLoja.js"></script>
