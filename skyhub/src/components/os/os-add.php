<template id="os-add">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">{{ loja.nick }}: {{ local.tipo }} - {{ local.name }} <p> <i class="fa fa-qrcode"></i> {{ }} <i class="fa fa-fw fa-barcode"></i>{{  }}</p></p>
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
                <v-select label="name" v-model="servico" :options="servicos"></v-select>
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
        <div v-if="!data" class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Categoria</label>
          </div>
          <div class="field-body">
            <div class="field">
              <p class="control has-icons-left">
                <v-select multiple label="name" v-model="categoria" :options="categorias"></v-select>
                <span class="icon is-small is-left">
                  <i class="fa fa-user-plus"></i>
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
            <div class="field">
              <p class="control has-icons-left">
                <v-select multiple label="user" v-model="tecnico" :options="tecnicos"></v-select>
                <span class="icon is-small is-left">
                  <i class="fa fa-user-plus"></i>
                </span>
              </p>
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
                <label class="radio">
                  <input value="0" v-model="ativo" type="radio"> Yes
                </label>
                <label class="radio">
                  <input value="1" v-model="ativo" type="radio">  No
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