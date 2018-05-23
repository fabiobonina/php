<template id="loja-cat">
    <div>
    <v-dialog v-model="dialog" max-width="500px">
      <v-card>
        <v-card-title>
          CATEGORIAS: {{ proprietario.nick }} - {{ loja.nick }} 
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <v-form>
            <div>
              <v-chip small v-for="item in loja.categoria" close @input="catDelete(item)" :key="item.id"
              :color="item.ativo =='0'? 'green' : '' " text-color="white">
                <v-avatar>
                  <v-btn flat small icon color=""
                    @click="catStatus(item); item.ativo == '0'? item.ativo = '1' : item.ativo = '0' ">
                    <v-icon v-if="item.ativo == '0'" dark>check_circle </v-icon>
                    <v-icon v-else dark>panorama_fish_eye</v-icon>
                  </v-btn>
                </v-avatar>
                <strong>{{ item.name }}</strong>
              </v-chip>
            </div>
            <v-autocomplete
              :items="categorias"
              v-model="categoria"
              label="Categorias"
              multiple
              chips
              max-height="auto"
            >
              <template slot="selection" slot-scope="data">
                <v-chip
                  :selected="data.selected"
                  :key="JSON.stringify(data.item)"
                  close
                  class="chip--select-multi"
                  @input="data.parent.selectItem(data.item)"
                >
                  {{ data.item.name }}
                </v-chip>
              </template>
              <template slot="item" slot-scope="data">
                <template v-if="typeof data.item !== 'object'">
                  <v-list-tile-content v-text="data.item"></v-list-tile-content>
                </template>
                <template v-else>
                  <v-list-tile-content>
                    <v-list-tile-title v-html="data.item.name"></v-list-tile-title>
                  </v-list-tile-content>
                </template>
              </template>
            </v-autocomplete>
          </v-form>
        </v-card-text>
        <v-card-actions>
          <template v-if="isLoading">
              <v-spacer></v-spacer>
              <v-progress-circular :size="40" :width="5" indeterminate color="primary"></v-progress-circular>
              <v-spacer></v-spacer>
          </template>
          <template v-else>
            <v-btn flat @click.stop="$emit('close')">Fechar</v-btn>
            <v-spacer></v-spacer>
            <v-btn color="primary" flat @click.stop="saveItem()">Salvar</v-btn>
          </template>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script src="src/components/loja/loja-cat.js"></script>