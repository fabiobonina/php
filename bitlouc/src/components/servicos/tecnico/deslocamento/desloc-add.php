<template id="desloc-add">
<div>
    <v-dialog v-model="dialog" persistent scrollable  max-width="500px">
      <v-card>
        <v-toolbar dark color="primary">
          <v-btn icon dark @click="$emit('close')">
            <v-icon>mdi-close</v-icon>
          </v-btn>
          <v-toolbar-title>{{ title }}</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn icon flat @click.native="saveItem()">
              <v-icon>mdi-content-save</v-icon>
            </v-btn>
          </v-toolbar-items>
        </v-toolbar>
        <v-card-text>
          <span class="headline">{{ data.local_tipo }} - {{ data.local_name }}</span>
          <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
          <loader :dialog="isLoading"></loader>
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
              <v-flex xs12 sm4 v-for="item in deslocStatus" :key="item.id">
                <v-btn block small @click="status = item" :class="status && status.id == item.id ? 'blue white--text' : 'light'">
                  <span>{{item.name }}</span>
                </v-btn>
              </v-flex>
            </v-layout>
            <label class="label">Tipo Trajeto</label>
            <v-layout row wrap align-center >
              <v-flex xs12 sm4 v-for="item in deslocTrajetos" :key="item.id">
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
                item-text="user_nick"
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
                    {{ data.item.user_nick }}
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
                      <v-list-tile-title v-html="data.item.user_nick"></v-list-tile-title>
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
                item-text="user_nick"
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
                    {{ data.item.user_nick }}
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
                      <v-list-tile-title v-html="data.item.user_nick"></v-list-tile-title>
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
      </v-card>
    </v-dialog>
  </div>
</template>
<script src="src/components/servicos/tecnico/deslocamento/desloc-add.js"></script>