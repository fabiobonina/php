<template id="local-cat">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">{{ loja.nick }} / {{ local.tipo }} {{ local.name }} <span class="mdi mdi-store"></span></p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <message :success="successMessage" :error="errorMessage"></message>
        <!--#CONTEUDO -->
        <h2 class="subtitle">Categorias</h2>
        <div v-for="item in local.categoria">
          <h2 class="subtitle"> {{ item.name }} - {{ item.tag }}
          <a v-if="item.ativo == 0" @click="ativo = '1'; catStatus(item)" class="button  is-small is-primary">Aivo &nbsp;
            <span class="icon is-small">
              <span class="mdi mdi-sync"></span>
            </span>
          </a>
          <a v-if="item.ativo == 1" @click="ativo = '0'; catStatus(item)" class="button  is-small is-light">Desativo &nbsp;
            <span class="icon is-small">
              <span class="mdi mdi-sync-off"></span>
            </span>
          </a>
            <a @click="ativo = '0'; catDelete(item)" class="button  is-small is-danger">Del &nbsp;
              <span class="icon is-small">
                <span class="mdi mdi-close"></span>
              </span>
            </a>
          </h2>
        </div>
        <br>
        
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Categorias</label>
          </div>
          <div class="field-body">
            <div class="control is-expanded">
              <div class="select is-fullwidth">
                <select name="country" v-model="item">
                  <option v-for="option in categorias" v-bind:value="option">{{ option.name }}</option>
                </select>
              </div>
            </div>
            <div class="control">
              <a v-on:click="addNewTodo"  class="button is-link">
                <span class="icon is-small"><span class="mdi mdi-tag-multiple"></span></span>
              </a>
            </div>
          </div>
        </div>
        
        <div id="todo-list-example">
          <ul>
            <li
              is="todo-item"
              v-for="(todo, index) in categoria"
              v-bind:key="todo.id"
              v-bind:user="todo.name"
              v-on:remove="categoria.splice(index, 1)"
            ></li>
          </ul>
        </div>
        
        <!--#CONTEUDO -->
      </section>
      <footer class="modal-card-foot field is-grouped is-grouped-right">
        <button class="button" v-on:click="$emit('close')">Cancel</button>
        <button :class="isLoading ? 'button is-info is-loading' : 'button is-info'" v-on:click="saveItem()">Save</button>
      </footer>
    </div>
  </div>
</template>
<script src="src/components/local/local-cat.js"></script>