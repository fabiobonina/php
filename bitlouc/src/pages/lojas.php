<template id="list">
  <div>
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Lojas
          <small>Lista</small>
        </h1>
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-dashboard"></i> Home</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="box box-default">
          <div class="box-body">
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
               <p>{{dados.length.locais}}</pP>  
              </div>
              <grid-lojas
                :data="dados"
                :columns="gridColumns"
                :filter-key="searchQuery">
              </grid-lojas>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
      <!-- /.content -->
  </div>
</template>