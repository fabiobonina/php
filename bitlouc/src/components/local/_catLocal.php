<template id="local-cat">
  <div>
  <div>
  <v-dialog v-model="dialog" persistent scrollable max-width="500px">
      <v-card>
        <v-card-title>
          CATEGORIAS: {{ loja.nick }} / {{ local.tipo }} {{ local.name }} 
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <v-form>
            <div>
              <v-chip small v-for="item in local.categoria" close @input="catDelete(item)" :key="item.id"
              :color="item.ativo =='0'? 'green' : '' " text-color="white">
                <v-avatar>
                  <v-btn flat small icon color=""
                    @click.stop="catStatus(item); item.ativo == '0'? item.ativo = '1' : item.ativo = '0' ">
                    <v-icon v-if="item.ativo == '0'" dark>label</v-icon>
                    <v-icon v-else dark>label</v-icon>
                  </v-btn>
                </v-avatar>
                <strong>{{ item.name }}</strong>
              </v-chip>
            </div>
            <v-autocomplete
              :items="categorias"
              v-model="categoria"
              label="Categorias"
              :error-messages="errors.collect('categoria')"
              v-validate="'required'"
              data-vv-name="categoria"
              required
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
          <template v-if="isLoading">
              <v-spacer></v-spacer>
              <v-progress-circular :size="40" :width="5" indeterminate color="primary"></v-progress-circular>
              <v-spacer></v-spacer>
          </template>
          <template v-else>
            <v-btn flat @click.stop="$emit('close')">Fechar</v-btn>
            <v-spacer></v-spacer>
            <v-btn color="primary" flat @click.stop="saveItem()">Salvar</v-btn>
          </template>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <div>
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
<script src="src/components/local/_catLocal.js"></script>