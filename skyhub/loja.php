<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Vuetify</title>
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet" type="text/css">
    <!--link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet" type="text/css"></link>
    <link href="styles.css" rel="stylesheet" type="text/css"-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="container">
      <h1>Usuarios</h1>
      <main id="app">
        <router-view></router-view>
      </main>
    </div>

    <template id="product">
      <div>
        <h2>{{ product.name }}</h2>
        <b>Description: </b>
        <div>{{ product.description }}</div>
        <b>Price:</b>
        <div>{{ product.price }}<span class="glyphicon glyphicon-euro"></span></div>
        <br/>
        <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
        <a><router-link to="/">Back to product list</router-link></a>
      </div>
    </template>
        
    <template id="product-list">
      <div>
        <div class="actions">
          <a class="btn btn-default" >
          <router-link :to="{path: '/add-user'}">
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
            :data="message"
            :columns="gridColumns"
            :filter-key="searchQuery">
          </tabela-grid>
        </div>
      </div>
    </template>

    <template id="grid-tabela">
      <div>
        <table class="table">
          <thead>
            <tr>
              <th v-for="key in columns"
                @click="sortBy(key)"
                :class="{ active: sortKey == key }">
                {{ key | capitalize }}
                <span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'">
                </span>
              </th>
              <th class="col-sm-2">Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="entry in filteredData">
              <td v-for="key in columns">
                {{entry[key]}}
              </td>
              <td>
                <a class="btn btn-default btn-xs"><router-link :to="{name: 'user', params: {_id: entry.id}}"><span class="glyphicon glyphicon-eye-open"></span> View</router-link></a>
                <a class="btn btn-warning btn-xs"><router-link :to="{name: 'edit', params: {_id: entry.id}}"><span class="glyphicon glyphicon-pencil"></span> Edit</router-link></a>
                <a class="btn btn-danger btn-xs"><router-link :to="{name: 'delete', params: {_id: entry.id}}"><span class="glyphicon glyphicon-trash"></span> Delete</router-link></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </template>
    
    <template id="grid-template">
      <div>
        <table>
          <thead>
            <tr>
              <th v-for="key in columns"
                @click="sortBy(key)"
                :class="{ active: sortKey == key }">
                {{ key | capitalize }}
                <span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'">
                </span>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="entry in filteredData">
              <td v-for="key in columns">
                {{entry[key]}}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </template>
        
    <template id="add-user">
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
        
    <template id="user-edit">
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
        
    <template id="user-delete">
      <div>
      <h2>Delete product {{ product.name }}</h2>
      <form v-on:submit="deleteProduct">
        <p>The action cannot be undone.</p>
        <button type="submit" class="btn btn-danger">Delete</button>
        <a class="btn btn-default"><router-link to="/">Cancel</router-link></a>
      </form>
      </div>
    </template>
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vuex/2.0.0-rc.4/vuex.js"></script>
    <script src="https://unpkg.com/vue-router@2.0.0/dist/vue-router.js"></script>
    <script src="lib/vue-resource.min.js"></script>
    <script src="app.js"></script>

  </body>
</html>
