<template id="os-add">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">{{ local.tipo }} - {{ local.name }} <p> <i class="fa fa-qrcode"></i> {{ }} <i class="fa fa-fw fa-barcode"></i>{{  }}</p></p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <message :success="successMessage" :error="errorMessage"></message>
        <!--#CONTEUDO -->
        <p>{{ loja.nick }}: {{ local.tipo }} - {{ local.name }}</p>
        <div v-if='data'>
          <i class="fa fa-qrcode"></i> {{ data.numeracao }} <i class="fa fa-fw fa-barcode"></i>{{ data.plaqueta }}
        </div>
        
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Serviço</label>
          </div>
          <div class="field-body">
            <div class="field">
              <div class="is-fullwidth">
                <p class="control has-icons-left">
                  <span class="select">
                    <select v-model="servico">
                      <option v-for="option in servicos" v-bind:value="option">{{ option.name }}</option>
                    </select>
                  </span>
                  <span class="icon is-small is-left">
                    <i class="fa fa-wrench"></i>
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
        
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Tecnicos</label>
          </div>
          <div class="field-body">
            <div class="control is-expanded">
              <div class="select is-fullwidth">
                <select name="country" v-model="item">
                  <option v-for="option in tecnicos" v-bind:value="option">{{ option.user }}</option>
                </select>
              </div>
            </div>
            <div class="control">
              <a v-on:click="addNewTodo"  class="button is-link">
                <span class="icon is-small"><i class="fa fa-user-plus"></i></span>
              </a>
            </div>
          </div>
        </div>
        
        <div id="todo-list-example">
          <ul>
            <li
              is="todo-item"
              v-for="(todo, index) in tecnico"
              v-bind:key="todo.id"
              v-bind:user="todo.user"
              v-on:remove="tecnico.splice(index, 1)"
            ></li>
          </ul>
        </div>

        <div class="field is-horizontal">
          <div class="field-label">
            <label class="label">Already a member?</label>
          </div>
          <div class="field-body">
            <div class="field is-narrow">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="member">
                  Yes
                </label>
                <label class="radio">
                  <input type="radio" name="member">
                  No
                </label>
              </div>
            </div>
          </div>
        </div>
        
        <!--#CONTEUDO -->
      </section>
      <footer class="modal-card-foot field is-grouped is-grouped-right">
        <button :class="isLoading ? 'button is-success is-loading' : 'button is-success'" v-on:click="saveItem()">Save</button>
        <button class="button" v-on:click="$emit('close')">Cancel</button>
      </footer>
    </div>
  </div>
</template>