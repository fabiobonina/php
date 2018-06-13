<template id="os-add">
  <div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">{{ local.tipo }} {{ local.name }} - Nova OS</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12>
                <div v-if='data'>
                  <p>{{ data.name }} - {{ data.modelo }} <i class="fa fa-qrcode"></i> {{ data.numeracao }} <i class="fa fa-fw fa-barcode"></i>{{ data.plaqueta }}</p>
                </div>
              </v-flex>
              <v-flex xs12 sm6 md4>
                <v-text-field
                  v-model="dataOs"
                  label="Data"
                  :error-messages="errors.collect('dataOs')"
                  v-validate="'required'"
                  data-vv-name="dataOs"
                  required
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md8>
                <v-autocomplete
                  :items="servicos"
                  v-model="servico"
                  item-text="name"
                  label="Serviços"
                  :error-messages="errors.collect('servico')"
                  v-validate="'required'"
                  data-vv-name="servico"
                  required
                ></v-autocomplete>
              </v-flex>
              <v-flex xs12 sm6 md4 v-if="!data">
                <v-autocomplete
                  :items="categorias"
                  v-model="categoria"
                  item-text="name"
                  label="Serviços"
                  :error-messages="errors.collect('categoria')"
                  v-validate="'required'"
                  data-vv-name="categoria"
                  required
                ></v-autocomplete>
              </v-flex>

              <v-flex xs12>
                <v-autocomplete
                  :items="tecnicos" v-model="tecnico" label="Tecnico"
                  :error-messages="errors.collect('tecnico')" v-validate="'required'" data-vv-name="tecnico"
                  required multiple chips max-height="auto"
                  >
                  <template slot="selection" slot-scope="data">
                    <v-chip
                      :selected="data.selected"
                      :key="JSON.stringify(data.item)"
                      close class="chip--select-multi"
                      @input="data.parent.selectItem(data.item)"
                    >
                      {{ data.item.userNick }}
                    </v-chip>
                  </template>
                  <template slot="item" slot-scope="data">
                    <template v-if="typeof data.item !== 'object'">
                      <v-list-tile-content v-text="data.item"></v-list-tile-content>
                    </template>
                    <template v-else>
                      <v-list-tile-content>
                        <v-list-tile-title v-html="data.item.userNick"></v-list-tile-title>
                      </v-list-tile-content>
                    </template>
                  </template>
                </v-autocomplete>
                <v-autocomplete
                  :items="tecnicos"
                  v-model="tecnico"
                  label="Select"
                  item-text="userNick"
                  item-value="name"
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
                      <v-avatar>
                        <img :src="data.item.avatar">
                      </v-avatar>
                      {{ data.item.userNick }}
                    </v-chip>
                  </template>
                  <template slot="item" slot-scope="data">
                    <template v-if="typeof data.item !== 'object'">
                      <v-list-tile-content v-text="data.item"></v-list-tile-content>
                    </template>
                    <template v-else>
                      <v-list-tile-avatar>
                        <img :src="data.item.avatar">
                      </v-list-tile-avatar>
                      <v-list-tile-content>
                        <v-list-tile-title v-html="data.item.userNick"></v-list-tile-title>
                        <v-list-tile-sub-title v-html="data.item.email"></v-list-tile-sub-title>
                      </v-list-tile-content>
                    </template>
                  </template>
                </v-autocomplete>
              </v-flex>
              <v-flex xs12 sm3>
                <v-subheader v-text="'Ativo?'"></v-subheader>
              </v-flex>
              <v-flex xs12 sm9>
                <v-radio-group v-model="ativo" row>
                  <v-radio label="Sim" value="0"></v-radio>
                  <v-radio label="Não" value="1"></v-radio>
                </v-radio-group>
              </v-flex>
            </v-layout>
          </v-container>
          <small>*indica campo obrigatório</small>

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
<script src="src/components/os/_addOs.js"></script>