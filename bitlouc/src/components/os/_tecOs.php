<template id="os-tec">
  <div class="modal is-active" >
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">OS: {{ data.local.tipo }} - {{ data.local.name }} </p>
        <button class="delete" aria-label="close" v-on:click="$emit('close')"></button>
      </header>
      <section class="modal-card-body">
        <message :success="successMessage" :error="errorMessage"></message>
        <!--#CONTEUDO -->
        
        <div v-if='data'>
          <p>{{ data.name }} - {{ data.modelo }} <i class="fa fa-qrcode"></i> {{ data.numeracao }} <i class="fa fa-fw fa-barcode"></i>{{ data.plaqueta }}</p>
        </div>
        <h2 class="subtitle">Tecnicos</h2>
        <div v-for="item in _os.tecnicos">
          <h2 class="subtitle"> {{ item.user }}
            <a @click="tecDelete(item)" class="button  is-small is-danger">Del &nbsp;
              <span class="icon is-small">
                <span class="mdi mdi-close"></span>
              </span>
            </a>
          </h2>
        </div>
        <br>

        <div class="field is-horizontal">
          <div class="field-label">
            <label class="label">Tecnicos</label>
          </div>
          <div class="field-body">
            <div class="field has-addons">
              <p class="control">
                <a class="button is-static">
                  <span class="mdi mdi-worker"></span>
                </a>
              </p>
              <p class="control">
                <v-select multiple label="userNick" v-model="tecnicos" :options="_tecnicos"></v-select>
              </p>
            </div>
          </div>
        </div>
        <br>
        <br>
        <!--#CONTEUDO -->
      </section>
      <footer class="modal-card-foot field is-grouped is-grouped-right">
        <button class="button" v-on:click="$emit('close')">Cancel</button>
        <button :class="isLoading ? 'button is-info is-loading' : 'button is-info'" v-on:click="saveItem()">Save</button>
      </footer>
    </div>
  </div>
</template>
<script src="src/components/os/_tecOs.js"></script>