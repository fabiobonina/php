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
        <div class="field">
          <label class="label">Categoria</label>
          <div class="control">
            <div>
              <v-select label="name" v-model="categoria" :options="categorias"></v-select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Produto</label>
          <div class="control">
            <div>
              <v-select label="name" v-model="produto" :options="produtos"></v-select>
            </div>
          </div>
        </div>
        <div class="field">
          <label class="label">Modelo</label>
          <div class="control">
            <input v-model="modelo" class="input" type="text" placeholder="Modelo">
          </div>
        </div>
        <div class="columns">
          <div class="column">
            <div class="field">
              <label class="label">Numeração</label>
              <div class="control">
                <input v-model="numeracao" class="input" type="text" placeholder="Mumeração">
              </div>
            </div>
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Plaqueta</label>
              <div class="control">
                <input v-model="plaqueta" class="input" type="text" placeholder="Plaqueta">
              </div>
            </div>
          </div>
        </div>
        <div class="field">
          <label class="label">Fabricante</label>
          <div class="control">
            <div>
              <v-select label="name" v-model="fabricante" :options="fabricantes"></v-select>
            </div>
          </div>
        </div>
        <div class="columns">
          <div class="column">
            <div class="field">
              <label class="label">Dt.Frabricação</label>
              <div class="control">
                <input v-model="dataFab" class="input" type="date" placeholder="Data fabricaçao">
              </div>
            </div>
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Dt.Compra</label>
              <div class="control">
                <input v-model="dataCompra" class="input" type="date" placeholder="Data compra">
              </div>
            </div>
          </div>
        </div>
        <div class="field is-horizontal">
          <div class="field">
            <label class="label">Ativo? &nbsp;</label>
          </div>
          <div class="field-body">
              <div class="control">
                <input type="radio" value="1" v-model="ativo">
                <label for="one">Não</label>
                <input type="radio" value="0" v-model="ativo">
                <label for="two">Sim</label>
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