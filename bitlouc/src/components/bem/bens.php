<template id="bens">
  <div>
    <section>
      <div>
        <ul>
          <li :class="active==1 ? 'is-active' : ''" @click="active='1'"><a>Operação</a></li>
          <li :class="active==0 ? 'is-active' : ''" @click="active='0'"><a>Instalação</a></li>
          <li :class="active==2 ? 'is-active' : ''" @click="active='2'"><a>Ocioso</a></li>
        </ul>
      </div>
    </section>
    <section>
      <div>
        <div>
          <input v-model="search" class="input" type="text" placeholder="Search">
        </div>
        <div>
          <a class="button is-info"><span class="mdi mdi-magnify"></span></a>
        </div>
        &nbsp;
        <div>
          <a v-on:click="modalAdd = true" class="button is-link is-al">
            <span class="mdi mdi-file-tree"></span> Bem
          </a>
        </div>
        &nbsp;
        <div>
          <a v-on:click="modalOs = true" class="button is-link is-al">
            <span class="mdi mdi-wrench"></span> OS
          </a>
        </div>
      </div>
      <bens-grid :data="bens" :categorias="local.categoria" :status="active" :filter-key="search"></bens-grid>
      <bem-add v-if="modalAdd" v-on:close="modalAdd = false" ></bem-add>
      <os-add v-if="modalOs" v-on:close="modalOs = false"  :data="modalItem"></os-add>
    </section>
  </div>
</template>
<script src="src/components/bem/bens.js"></script>

<?php require_once 'src/components/bem/bens-grid.php';?>
<?php require_once 'src/components/bem/bem-add.php';?>
<?php require_once 'src/components/bem/bem-edt.php';?>
<?php require_once 'src/components/bem/bem-del.php';?>