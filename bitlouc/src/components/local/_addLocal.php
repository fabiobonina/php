<template id="local-add">
  <div class="modal is-active" >
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">{{ loja.nick }} - Nova Local</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <section class="modal-card-body">
            <div class="field has-addons">
              <p class="control">
                <span class="select">
                  <select v-model="tipo" class="form-control">
                    <option v-for="option in tipos" v-bind:value="option.id">{{ option.name }}</option>
                  </select>
                </span>
              </p>
              <p class="control is-expanded">
                <input v-model="name" class="input" type="text" placeholder="Nome*">
              </p>
            </div>
            <div class="field is-horizontal">
              <div class="field-body">
                <div class="field">
                  <p class="control is-expanded has-icons-left">
                    <input v-model="municipio" class="input" type="text" placeholder="Municipio*">
                    <span class="icon is-small is-left">
                      <i class="fas fa-user"></i>
                    </span>
                  </p>
                </div>
                <div class="field">
                  <p class="control is-expanded has-icons-right">
                    <input v-model="uf" class="input" type="uf" placeholder="UF*">
                    <span class="icon is-small is-right">
                      <i class="fas fa-check"></i>
                    </span>
                  </p>
                </div>
              </div>
            </div>
            <div class="field">
              <p class="control has-icons-right">
                <input v-model="coordenadas" class="input" type="text" placeholder="Coordenadas">
                <span class="icon is-small is-right">
                  <span class="mdi mdi-map-marker"></span>
                </span>
              </p>
            </div>
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
            <div class="field is-horizontal">
              <div class="field-label">
                <label class="label">Ativo?</label>
              </div>
              <div class="field-body">
                <div class="field is-narrow">
                  <div class="control">
                    <input type="radio" value="1" v-model="ativo">
                    <label for="one">Não</label>
                    <input type="radio" value="0" v-model="ativo">
                    <label for="two">Sim</label>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12 sm6 md4>
                <v-text-field label="Legal first name" required></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4>
                <v-text-field label="Legal middle name" hint="example of helper text only on focus"></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4>
                <v-text-field
                  label="Legal last name"
                  hint="example of persistent helper text"
                  persistent-hint
                  required
                ></v-text-field>
              </v-flex>
              <v-flex xs12>
                <v-text-field label="Email" required></v-text-field>
              </v-flex>
              <v-flex xs12>
                <v-text-field label="Password" type="password" required></v-text-field>
              </v-flex>
              <v-flex xs12 sm6>
                <v-select
                  :items="['0-17', '18-29', '30-54', '54+']"
                  label="Age"
                  required
                ></v-select>
              </v-flex>
              <v-flex xs12 sm6>
                <v-autocomplete
                  :items="['Skiing', 'Ice hockey', 'Soccer', 'Basketball', 'Hockey', 'Reading', 'Writing', 'Coding', 'Basejump']"
                  label="Interests"
                  multiple
                  chips
                ></v-autocomplete>
              </v-flex>
            </v-layout>
          </v-container>
          <small>*indicates required field</small>

          <v-form>
            <v-text-field
              v-model="regional"
              label="Regional"
              :error-messages="errors.collect('regional')"
              v-validate="'required'"
              data-vv-name="regional"
              required
            ></v-text-field>
            <v-text-field
              v-model="name"
              label="Nome"
              :error-messages="errors.collect('name')"
              v-validate="'required'"
              data-vv-name="name"
              required
            ></v-text-field>
            <v-text-field
              v-model="nick"
              label="Nome Fantasia"
              :counter="20"
              :error-messages="errors.collect('nick')"
              v-validate="'required|max:20'"
              data-vv-name="nick"
              required
            ></v-text-field>
            <v-select
              :items="grupos"
              v-model="grupo"
              item-text="name"
              item-value="id"
              label="Grupo"
              :error-messages="errors.collect('grupo')"
              v-validate="'required'"
              data-vv-name="grupo"
              required
            ></v-select>
            <v-select
              :items="seguimentos"
              v-model="seguimento"
              item-text="name"
              item-value="id"
              label="Seguimento"
              :error-messages="errors.collect('seguimento')"
              v-validate="'required'"
              data-vv-name="seguimento"
              required
            ></v-select>
            <v-autocomplete
              :items="categorias" v-model="categoria" label="Categorias"
              :error-messages="errors.collect('categoria')" v-validate="'required'" data-vv-name="categoria"
              required multiple chips max-height="auto"
              >
              <template slot="selection" slot-scope="data">
                <v-chip
                  :selected="data.selected"
                  :key="JSON.stringify(data.item)"
                  close class="chip--select-multi"
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
            <p>Ativo?</p>
            <v-btn flat icon color=""
              @click.native="ativo == '0'? ativo = '1': ativo = '0'">
              <v-icon v-if="ativo == '0'" dark>toggle_on</v-icon>
              <v-icon v-else dark>toggle_off</v-icon>
              </v-btn>
              <v-btn flat icon color="blue lighten-2">
                <v-icon>toggle_on</v-icon>
              </v-btn>

              <v-btn flat icon color="red lighten-2">
                <v-icon>toggle_off</v-icon>
              </v-btn>
            <v-radio-group v-model="ativo" row>
              <v-radio label="Sim" value="0" ></v-radio>
              <v-radio label="Não" value="1"></v-radio>
            </v-radio-group>
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
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Loja: {{loja.nick}}</p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <message :success="successMessage" :error="errorMessage"></message>
        <!--#CONTEUDO -->
        <div class="field">
          <p class="control has-icons-right">
            <input v-model="regional" class="input" type="text" placeholder="Regional">
            <span class="icon is-small is-right">
              <span class="mdi "></span>
            </span>
          </p>
        </div>
        <div class="field has-addons">
          <p class="control">
            <span class="select">
              <select v-model="tipo" class="form-control">
                <option v-for="option in tipos" v-bind:value="option.id">{{ option.name }}</option>
              </select>
            </span>
          </p>
          <p class="control is-expanded">
            <input v-model="name" class="input" type="text" placeholder="Nome*">
          </p>
        </div>

        <div class="field is-horizontal">
          <div class="field-body">
            <div class="field">
              <p class="control is-expanded has-icons-left">
                <input v-model="municipio" class="input" type="text" placeholder="Municipio*">
                <span class="icon is-small is-left">
                  <i class="fas fa-user"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <p class="control is-expanded has-icons-right">
                <input v-model="uf" class="input" type="uf" placeholder="UF*">
                <span class="icon is-small is-right">
                  <i class="fas fa-check"></i>
                </span>
              </p>
            </div>
          </div>
        </div>


        <div class="field">
          <p class="control has-icons-right">
            <input v-model="coordenadas" class="input" type="text" placeholder="Coordenadas">
            <span class="icon is-small is-right">
              <span class="mdi mdi-map-marker"></span>
            </span>
          </p>
        </div>
        
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

        <div class="field is-horizontal">
          <div class="field-label">
            <label class="label">Ativo?</label>
          </div>
          <div class="field-body">
            <div class="field is-narrow">
              <div class="control">
                <input type="radio" value="1" v-model="ativo">
                <label for="one">Não</label>
                <input type="radio" value="0" v-model="ativo">
                <label for="two">Sim</label>
              </div>
            </div>
          </div>
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
<script src="src/components/local/_addLocal.js"></script>