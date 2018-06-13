<template id="bens">
  <div>
    <v-container fluid class="pa-0">
      <v-layout row wrap>
        <v-btn-toggle v-if="user.nivel > 1 && user.grupo == 'P'"  v-model="active">
          <v-btn flat  v-for="n in itens" v-on:click="active = n.ativo " :value="n.ativo" :key="n.id">
            <v-icon>{{ n.icon }}</v-icon>
            <span>{{ n.name }}</span>
          </v-btn>
        </v-btn-toggle>
      </v-layout>
    </v-container>
    <section>
      <bens-grid :data="bens" :categorias="local.categoria" :status="active"></bens-grid>
      <bem-add v-if="modalAdd" v-on:close="modalAdd = false" ></bem-add>
    </section>
  </div>
</template>
<script src="src/components/bem/bens.js"></script>

<?php require_once 'src/components/bem/bens-grid.php';?>