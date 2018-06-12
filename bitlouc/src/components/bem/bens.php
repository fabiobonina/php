<template id="bens">
  <div>
    <section>
      <div>
          <li :class="active==1 ? 'is-active' : ''" @click="active='1'"><a>Operação</a></li>
          <li :class="active==0 ? 'is-active' : ''" @click="active='0'"><a>Instalação</a></li>
          <li :class="active==2 ? 'is-active' : ''" @click="active='2'"><a>Ocioso</a></li>
      </div>
    </section>
    <section>

      <bens-grid :data="bens" :categorias="local.categoria" :status="active"></bens-grid>
      <bem-add v-if="modalAdd" v-on:close="modalAdd = false" ></bem-add>
      
    </section>
  </div>
</template>
<script src="src/components/bem/bens.js"></script>

<?php require_once 'src/components/bem/bens-grid.php';?>