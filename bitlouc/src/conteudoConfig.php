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
            <h3 class="widget-user-username">{{ dados.displayName }}</h3>
            <h5 class="widget-user-desc">Nome: {{ dados.name }}</h5>
            <h5 class="widget-user-desc">Senguimento: {{ dados.seguimento }}</h5>
          </div>
          <!--div class="widget-user-image">
            <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
          </div-->
          <div class="box-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">3,200</h5>
                  <span class="description-text">SALES</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">13,000</h5>
                  <span class="description-text">FOLLOWERS</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
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
                <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span><span class="pull-right badge bg-blue">31</span></a></li>
                <li><a href="#">Tasks <span class="pull-right badge bg-aqua">5</span></a></li>
                <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
                <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>
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
              <a :href="'#/loja/' + entry.id" class="product-title">{{entry.nome}}
                <span class="label label-warning pull-right">Lacalidades: {{}}</span></a>
              <span class="product-description">{{entry.name}}</span>
            </div>
          </li>
          <!-- /.item -->
        </ul>
      </div>
    </template>
        
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

    <template id="grid-tabela">
      <div>
        <!-- PRODUCT LIST -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Lista</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <ul class="products-list product-list-in-box">
              <li class="item"  v-for="entry in filteredData">
                <div class="product-img">
                  <img src="dist/img/default-50x50.gif" alt="Product Image">
                </div>
                <div class="product-info">
                  <a :href="'#/loja/' + entry.id" class="product-title">{{entry.displayName}}
                    <span class="label label-warning pull-right">Lacalidades: {{ entry.locais.length}}</span></a>
                  <span class="product-description">{{entry.name}}</span>
                </div>
              </li>
              <!-- /.item -->
            </ul>
          </div>
          <!-- /.box-body -->
          <!-- /.box-footer -->
        </div>
        <!--div class="list-group" v-for="entry in filteredData">
          <a :href="'#/loja/' + entry.loja.id" class="list-group-item"><h4 class="list-group-item-heading">{{entry.loja.displayName}}</h4>
            <p class="list-group-item-text">{{entry.loja.name}}</p><span class="glyphicon glyphicon-eye-open"></span>{{entry.locais.length}} View <span class="glyphicon glyphicon-eye-open"></span>
          </a>
        </div-->
        
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
