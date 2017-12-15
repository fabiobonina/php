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
    <grid-lojas
      :data="dados"
      :columns="gridColumns"
      :filter-key="searchQuery">
    </grid-lojas>
  </div>
</div>
</template>