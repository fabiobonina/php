<template id="lojas">
  <div>
    <br>
    <div class="field has-addons">
      <div class="control">
        <input v-model="search" class="input" type="text" placeholder="Search">
      </div>
      <div class="control">
        <a class="button is-info">
          <span class="mdi mdi-magnify"></span>
        </a>
      </div>
      <p class="control has-icons-right">
                  <input class="input" v-model="search" type="text" placeholder="Filtar localidade">
                  <span class="icon is-small is-right">
                    <span class="mdi mdi-domain"></span>
                  </span>
                </p>
                <div>
      <a v-on:click="modalLojaAdd = true; selecItem(dados)" class="button is-primary is-al">
      <span class="mdi mdi-domain"></span> Loja
      </a>
    </div>
    </div>
    <div>
      <a v-on:click="modalLojaAdd = true; selecItem(dados)" class="button is-primary is-al">
        <i class="fa fa-building-o"></i> Loja
      </a>
    </div>
    <br>
    <grid-lojas :data="lojas" :columns="gridColumns"></grid-lojas>
  </div>
</template>