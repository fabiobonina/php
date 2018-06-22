<template id="desloc-add">
<div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-card-title>
          <span class="headline">{{ data.local.tipo }} - {{ data.local.name }} - Deslocamento</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <v-container grid-list-md>
            <!--#INICIO -->
            <v-flex xs12>
              <v-text-field
                type="datetime-local"
                v-model="date"
                label="Data"
                :error-messages="errors.collect('date')"
                v-validate="'required'"
                data-vv-name="date"
                item-text="name"
                required
              ></v-text-field>
            </v-flex>
            <label class="label">Status</label>
            <v-layout row wrap align-center >
              <v-flex xs12 sm4 v-for="item in deslocStatus">
                <v-btn block small @click="status = item" :class="status && status.id == item.id ? 'blue white--text' : 'light'">
                  <span>{{item.name }}</span>
                </v-btn>
              </v-flex>
            </v-layout>
            <label class="label">Tipo Trajeto</label>
            <v-layout row wrap align-center >
              <v-flex xs12 sm4 v-for="item in deslocTrajetos">
                <v-btn block small @click="trajeto = item" :class="trajeto && trajeto.id == item.id ? 'blue white--text' : 'light'">
                  <span>{{item.name }}</span>
                </v-btn>
              </v-flex>
            </v-layout>
            
            <v-flex xs12>
              <v-autocomplete
                :items="data.tecnicos"
                v-model="tecnico"
                label="Tecnico"
                item-text="userNick"
                chips
                return-object
                max-height="auto"
                :error-messages="errors.collect('tecnico')" v-validate="'required'" data-vv-name="tecnico"
                required
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
            <v-flex xs12 v-if="trajeto != null && trajeto.categoria == 0 && data.tecnicos.length > 1" >
              <v-autocomplete
                :items="data.tecnicos"
                v-model="tecnicos"
                label="Outros Tecnicos"
                item-text="userNick"
                multiple
                chips
                return-object
                max-height="auto"
                :error-messages="errors.collect('tecnico')" v-validate="''" data-vv-name="tecnicos"
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
            <v-flex xs12 sm6 md6>
              <v-text-field 
                type="number"
                v-model="km"
                label="Km"
                :error-messages="errors.collect('km')"
                v-validate="''"
                data-vv-name="km"
                item-text="name"
                :disabled="trajeto && trajeto.categoria > 0"
              ></v-text-field>
            </v-flex>
            <v-flex xs12 sm6 md6>
              <v-text-field 
                type="number"
                v-model="valor"
                label="Valor"
                :error-messages="errors.collect('valor')"
                v-validate="''"
                data-vv-name="valor"
                item-text="name"
                :disabled="trajeto && trajeto.categoria != 1"
              ></v-text-field>
            </v-flex>
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
<script src="src/components/servicos/tecnico/deslocamento/desloc-add.js"></script>