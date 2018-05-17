
<template id="os-status">
  <div>
    <v-container fluid class="pa-0">
      <v-layout row wrap>
          <v-btn-toggle v-if="user.nivel > 1 && user.grupo == 'P'"  v-model="ativo">
            <v-btn flat  v-for="n in itens" v-on:click="status( n.ativo)" :value="n.ativo">
              <v-icon>{{ n.icon }}</v-icon>
              <span>{{ n.name }}</span>
            </v-btn>
            <v-btn v-if="user.nivel > 2 && user.grupo == 'P'" flat v-on:click="ativo = '3'" value="3">
              <v-icon>done</v-icon>
              <span>Fechardas</span>
            </v-btn>
          </v-btn-toggle>

      </v-layout>
    </v-container>    
    <section class="container">
      <div>
        <os-grid :data="oss" :status="ativo"></os-grid>
      </div>
    </section>
  </div>
</template>
<script src="src/components/os/osStus.js"></script>