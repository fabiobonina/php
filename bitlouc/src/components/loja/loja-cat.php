<template id="loja-cat">
      <v-dialog v-model="dialog" max-width="500px">
        <v-card>
          <v-card-title>
          {{ proprietario.nick }} - {{ loja.nick }} 
          </v-card-title>
          <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
        <v-form>
          <div>
            <v-chip small v-for="categoria in loja.categoria" close @input="remove(categoria.id)" :key="categoria.id">
              {{ categoria.name }}
            </v-chip>
          </div>

          
        <v-autocomplete
          :items="categorias"
          v-model="categoria"
          label="Categorias"
          item-text="name"
          item-value="name"
          multiple
          chips
          max-height="auto"
        >
          <template slot="selection" slot-scope="data">
            <v-chip
              :selected="data.selected"
              :key="JSON.stringify(data.item)"
              close
              class="chip--select-multi"
              @input="data.parent.selectItem(data.item)"
            >
              {{ data.item.name }}
            </v-chip>
          </template>
          <template slot="item" slot-scope="data">
            <template v-if="typeof data.item !== 'object'">
              <v-list-tile-content v-text="data.item"></v-list-tile-content>
            </template>
            <template v-else>
              <v-list-tile-content>
                <v-list-tile-title v-html="data.item.name"></v-list-tile-title>
              </v-list-tile-content>
            </template>
          </template>
        </v-autocomplete>
          
        </v-form>
            
          </v-card-text>
          <v-card-actions>
            <v-btn color="primary" flat @click.stop="$emit('close')">Close</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <section class="modal-card-body">
        <message :success="successMessage" :error="errorMessage"></message>
        <!--#CONTEUDO -->
        <h2 class="subtitle">Categorias</h2>
        <div v-for="item in loja.categoria">
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
<script src="src/components/loja/loja-cat.js"></script>