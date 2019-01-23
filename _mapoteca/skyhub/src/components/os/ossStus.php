
<template id="oss-stus">
  <div>
    <section class="container">
      <div class="field has-addons">
        <div v-if="user.nivel > 1 && user.grupo == 'P'" class="control">
          
          <a v-on:click="status = '0'" :class="status == '0'? 'button is-info is-al' :'button is-light is-al'">
            <span class="mdi mdi-check"></span>sem Amaração
          </a>
          <a v-on:click="status = '1'" :class="status == '1'? 'button is-info is-al' :'button is-light is-al'">
            <span class="mdi mdi-check"></span>Abertas
          </a>
          <a v-on:click="status = '2'" :class="status == '2'? 'button is-info is-al' :'button is-light is-al'">
            <span class="mdi mdi-check"></span> Retornos
          </a>
        </div>
        &nbsp;
        <div v-if="user.nivel > 2 && user.grupo == 'P'" class="control">
          <a v-on:click="status = '3'" :class="status == '3'? 'button is-info is-al' :'button is-light is-al'">
            <span class="mdi mdi-check"></span>Fechardas
          </a>
        </div>
      </div>
    </section>
    
    <section class="container">
      <div>
        <os-grid :data="oss" :status="status"></os-grid>
      </div>
    </section>
  </div>
</template>