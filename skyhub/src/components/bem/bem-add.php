<template id="bem-add">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">{{ loja.nick }}: {{ local.tipo }} - {{ local.name }}</p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <message :success="successMessage" :error="errorMessage"></message>
        <!--#CONTEUDO -->
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
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Grupo / seguimento</label>
          </div>
          <div class="field-body">
            <div class="field">
              <div class="is-fullwidth">
                <p class="control has-icons-left">
                  <span class="select">
                    <select v-model="grupo">
                      <option v-for="option in grupos" v-bind:value="option.id">{{ option.name }}</option>
                    </select>
                  </span>
                  <span class="icon is-small is-left">
                  <span class="mdi mdi-format-text"></span>
                  </span>
                </p>
              </div>
            </div>
            <div class="field">
            <div class="is-fullwidth">
                <p class="control has-icons-left">
                  <span class="select">
                    <select v-model="seguimento">
                      <option v-for="option in seguimentos" v-bind:value="option.id">{{ option.name }}</option>
                    </select>
                  </span>
                  <span class="icon is-small is-left">
                  <span class="mdi mdi-format-text"></span>
                  </span>
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="field">
          <p class="control has-icons-right">
            <input v-model="name" class="input" type="text" placeholder="Nome">
            <span class="icon is-small is-right">
              <span class="mdi mdi-store"></span>
            </span>
          </p>
        </div>
        <div class="field">
          <p class="control has-icons-right">
            <input v-model="nick" class="input" type="text" placeholder="Nome Fantasia">
            <span class="icon is-small is-right">
              <span class="mdi mdi-store"></span>
            </span>
          </p>
        </div>
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Grupo / seguimento</label>
          </div>
          <div class="field-body">
            <div class="field">
              <div class="is-fullwidth">
                <p class="control has-icons-left">
                  <span class="select">
                    <select v-model="grupo">
                      <option v-for="option in grupos" v-bind:value="option.id">{{ option.name }}</option>
                    </select>
                  </span>
                  <span class="icon is-small is-left">
                  <span class="mdi mdi-format-text"></span>
                  </span>
                </p>
              </div>
            </div>
            <div class="field">
            <div class="is-fullwidth">
                <p class="control has-icons-left">
                  <span class="select">
                    <select v-model="seguimento">
                      <option v-for="option in seguimentos" v-bind:value="option.id">{{ option.name }}</option>
                    </select>
                  </span>
                  <span class="icon is-small is-left">
                  <span class="mdi mdi-format-text"></span>
                  </span>
                </p>
              </div>
            </div>
          </div>
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
        <div class="form-horizontal">
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Produto*</label>
            <div class="col-sm-10">
              <select v-model="produto" class="form-control">
                <option v-for="option in produtos" v-bind:value="option">{{ option.name }}</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Modelo*</label>
            <div class="col-sm-10">
              <input v-model="modelo" type="text" class="form-control" id="inputPassword3" placeholder="Modelo">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Numeração</label>
            <div class="col-sm-10">
              <input v-model="numeracao" type="text" class="form-control" id="inputPassword3" placeholder="Numeração">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Fabricante*</label>
            <div class="col-sm-10">
              <select v-model="fabricante" class="form-control">
                <option v-for="option in fabricantes" v-bind:value="option">{{ option.name }}</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Categ. *</label>
            <div class="col-sm-10">
              <select v-model="categoria" class="form-control">
                <option v-for="option in categorias" v-bind:value="option">{{ option.name }}</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Plaqueta</label>
            <div class="col-sm-10">
              <input v-model="plaqueta" type="text" class="form-control" id="inputPassword3" placeholder="plaqueta">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Dt.Fabrib.</label>
            <div class="col-sm-10">
              <input v-model="dataFab" type="date" class="form-control" id="inputPassword3" placeholder="Data Fabricaçao">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Dt.Compra*</label>
            <div class="col-sm-10">
              <input v-model="dataCompra" type="date" class="form-control" id="inputPassword3" placeholder="Data compra">
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