
<template id="local-oss">
  <div>
    <section class="container">
      <div>
        <section class="container">
          <div>
            <os-grid :data="oss" :status="status"></os-grid>
          </div>
        </section>
        <local-add v-if="modalLocalAdd" v-on:close="modalLocalAdd = false" :data="loja" @atualizar="onAtualizar"></local-add>
      </div>
    </section>
  </div>
</template>
<script src="src/components/atendimento/os/localOss.js"></script>