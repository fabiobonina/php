<template id="mod-add">
  <div>
    <v-dialog v-model="dialog" fullscreen hide-overlay persistent>
      <v-card color="grey darken-4">
      <v-toolbar dark color="primary">
          <v-btn icon dark @click.stop="$emit('close')">
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title>Atendimento</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn dark flat @click="saveItem()">Salvar</v-btn>
          </v-toolbar-items>
        </v-toolbar>
        <v-card-text>
          <message :alerta="temMessage" :success="successMessage" :error="errorMessage"></message>
          <loader></loader>
            <template>
              <!-- tecnicos -->
              <v-autocomplete solo multiple chips return-object max-height="auto"
                :items="data.tecnicos" v-model="tecnicos" label="Tecnicos" item-text="userNick"
                :error-messages="errors.collect('tecnico')" v-validate="'required'" data-vv-name="tecnico" required>
                <template slot="selection" slot-scope="data">
                  <v-chip :selected="data.selected" :key="JSON.stringify(data.item)" close
                    class="chip--select-multi" @input="data.parent.selectItem(data.item)" >
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
            </template>
          </v-container>
        </v-card-text>

        <template>
          <v-stepper v-model="progresso" vertical light dark>
            <v-stepper-step editable :complete="Number(progresso) > 1" step="1">
              {{ dateInicio }} {{ horaInicio }}
              <small>Atendimento Inicial</small>
            </v-stepper-step>
            <v-stepper-content step="1">
              <v-layout wrap align-center>
                <v-flex xs12 sm12 md3>
                  <span class="headline white--text">Atendimento Inicial</span>
                </v-flex>
                <v-flex xs7 sm7 md3 >
                  <v-text-field outline
                    type="date"
                    v-model="dateInicio"
                    label="Data Inicio"
                    :error-messages="errors.collect('dateInicio')"
                    v-validate="'required'"
                    data-vv-name="dateInicio"
                    item-text="name"
                    required
                  ></v-text-field>
                </v-flex>
                <v-flex xs5 sm5 md2>
                  <v-text-field outline 
                    type="time"
                    v-model="horaInicio"
                    label="Hora Inicio"
                    :error-messages="errors.collect('horaInicio')"
                    v-validate="'required'"
                    data-vv-name="horaInicio"
                    item-text="name"
                    required
                  ></v-text-field>
                </v-flex>
              </v-layout>
            </v-stepper-content>

            <v-stepper-step editable step="2">
              {{ dateFinal }} {{ horaFinal }}
              <small>Atendimento Final</small>
            </v-stepper-step>
            <v-stepper-content step="2">
              <v-layout wrap align-center>
                <v-flex xs12 sm12 md3>
                  <span class="headline white--text">Atendimento Final</span>
                </v-flex>
                <v-flex xs7 sm7 md2>
                  <v-text-field outline 
                    type="date"
                    v-model="dateFinal"
                    label="Data"
                    :error-messages="errors.collect('dateFinal')"
                    v-validate="'required'"
                    data-vv-name="dateFinal"
                    item-text="name"
                    required
                  ></v-text-field>
                </v-flex>
                <v-flex xs5 sm5 md2>
                  <v-text-field outline 
                    type="time"
                    v-model="horaFinal"
                    label="Hora"
                    :error-messages="errors.collect('horaFinal')"
                    v-validate="'required'"
                    data-vv-name="horaFinal"
                    item-text="name"
                    required
                  ></v-text-field>
                </v-flex>
              </v-layout>

            </v-stepper-content>
          </v-stepper>
        </template>
        <v-container fluid grid-list-xl>
        <v-layout wrap align-center>
        <v-flex>
          <v-text-field solo 
            type="number"
            v-model="tempo"
            label="Tempo"
            :error-messages="errors.collect('tempo')"
            v-validate="''"
            data-vv-name="tempo"
            item-text="name"
            disabled
          ></v-text-field>
        </v-flex>
        </v-layout>
        </v-container>
      </v-card>
    </v-dialog>
  </div>
</template>
<script src="src/components/servicos/tecnico/mod/mod-add.js"></script>