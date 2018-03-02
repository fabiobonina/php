<template id="loja-cat">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">{{ proprietario.nick }} - Editar Loja <span class="mdi mdi-store"></span></p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <message :success="successMessage" :error="errorMessage"></message>
        <!--#CONTEUDO -->
        <h2 class="subtitle">{{ data.nick }}</h2>
        <div v-for="item in data.categoria">
          <h2 class="subtitle"> {{ item.name }} - {{ item.tag }}
          <a v-if="item.ativo == 0" @click="ativo = 1; selecItem(entry)" class="button  is-small is-primary">Desativar
            <span class="icon is-small">
              <span class="mdi mdi-check"></span>
            </span>
          </a>
          <a v-if="item.ativo == 1" @click="ativo = 0; selecItem(entry)" class="button  is-small is-light">Desativar
            <span class="icon is-small">
              <span class="mdi mdi-check"></span>
            </span>
          </a>
            <a class="button  is-small is-link">Link
              <span class="icon is-small">
                <span class="mdi mdi-check"></span>
              </span>
            </a>
          </h2>
        </div>
        <br>
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Serviço</label>
          </div>
          <div class="field-body">
            <div class="field">
              <div class="is-fullwidth">
                <p class="control has-icons-left">
                  <input v-model="dataOs" class="input" type="date">
                  <span class="icon is-small is-left">
                    <i class="fa fa-calendar"></i>
                  </span>
                </p>
              </div>
            </div>
            <div class="field">
              <p class="control is-expanded has-icons-left">
                <input v-model="dataOs" class="input" type="date">
                <span class="icon is-small is-left">
                  <i class="fa fa-calendar"></i>
                </span>
              </p>
            </div>
          </div>
        </div>
        <div class="field">
          <p class="control has-icons-right">
            <input v-model="data.name" class="input" type="text" placeholder="Nome">
            <span class="icon is-small is-right">
              <span class="mdi mdi-store"></span>
            </span>
          </p>
        </div>
        <div class="field">
          <p class="control has-icons-right">
            <input v-model="data.nick" class="input" type="text" placeholder="Nome Fantasia">
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
                    <select v-model="data.grupo">
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
                    <select v-model="data.seguimento">
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
          <div class="field-label">
            <label class="label">Ativo?</label>
          </div>
          <div class="field-body">
            <div class="field is-narrow">
              <div class="control">
                <input type="radio" value="1" v-model="data.ativo">
                <label for="one">Não</label>
                <input type="radio" value="0" v-model="data.ativo">
                <label for="two">Sim</label>
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
        
        <!--#CONTEUDO -->
      </section>
      <footer class="modal-card-foot field is-grouped is-grouped-right">
        <button class="button" v-on:click="$emit('close')">Cancel</button>
        <button :class="isLoading ? 'button is-info is-loading' : 'button is-info'" v-on:click="saveItem()">Save</button>
      </footer>
    </div>
  </div>
</template>