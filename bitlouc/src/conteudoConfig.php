<style>
    .vue-modal-mask {
      position: fixed;
      z-index: 9998;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, .5);
      display: table;
      transition: opacity .3s ease;
    }
    
    .vue-modal-wrapper {
      display: table-cell;
      vertical-align: middle;
    }
    
    .vue-modal-container {
      width: auto;
      max-width: 45%;
      margin: 0px auto;
      padding: 20px 30px;
      background-color: #fff;
      border-radius: 2px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
      transition: all .3s ease;
      font-family: Helvetica, Arial, sans-serif;
    }
    
    .vue-modal-header h3 {
      margin-top: 0;
      color: #3270ad;
    }
    
    .vue-modal-body {
      margin: 25px 0;
      h4 {
        color: #52575d;
      }
    }
    
    .vue-modal-footer {
      min-height: 20px;
    }
    
    .vue-modal-default-button {
      float: right;
    }
    
    #unsupported-banner {
      z-index: 999999;
      position: fixed;
      top: 0;
      right: 0;
      left: 0;
      background: #ea3030;
      width: 100%;
      border-bottom: 1px solid #EEEEEE;
      padding: 10px;
      box-sizing: border-box;
      transform: translateY(-150%);
      color: #FFFFFF;
      font-family: "Open Sans", sans-serif;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      text-align: center;
      animation: vue-banner-slide-in 0.8s ease forwards;
    }
    
    .modal-enter {
      opacity: 0;
    }
    
    .modal-leave-active {
      opacity: 0;
    }
    
    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
      -webkit-transform: scale(1.1);
      transform: scale(1.1);
    }
    
    @keyframes vue-banner-slide-in {
      0% {
        transform: translateY(-150%);
      }
      
      100% {
        transform: translateY(0%);
      }
    }
  </style>
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
    <?php include("src/components/grid-local.php");?>
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
