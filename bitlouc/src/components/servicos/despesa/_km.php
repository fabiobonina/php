<template id="km-desp">
  <div>
  <v-layout row justify-center>
      <v-dialog v-model="dialog" hide-overlay transition="dialog-bottom-transition">
        <v-btn slot="activator" color="primary" small dark>Km Dialog</v-btn>          
          <v-card>
          <v-toolbar dark color="blue">
            <v-btn icon dark @click.native="dialog = false">
              <v-icon>close</v-icon>
            </v-btn>
            <v-toolbar-title>Km</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
              <v-btn dark flat @click.native="saveItem()">Salvar</v-btn>
            </v-toolbar-items>
          </v-toolbar>

          <v-divider></v-divider>
          <v-card-text>
            <message :success="successMessage" :error="errorMessage"></message>
            <loader :dialog="isLoading"></loader>
            <v-container grid-list-md>
              <v-layout wrap>
                <v-flex xs12 sm6 md6>
                  <v-text-field 
                    type="number"
                    v-model="kmInicio"
                    label="Km Inicio"
                    :error-messages="errors.collect('kmInicio')"
                    v-validate="''"
                    data-vv-name="kmInicio"
                    item-text="name"
                  ></v-text-field>
                </v-flex>
                <v-flex xs12 sm6 md6>
                  <v-text-field 
                    type="number"
                    v-model="kmFinal"
                    label="Km Final"
                    :error-messages="errors.collect('kmFinal')"
                    v-validate="''"
                    data-vv-name="kmFinal"
                    item-text="name"
                  ></v-text-field>
                </v-flex>
                <v-flex xs12>
                  <v-text-field 
                    type="number"
                    v-model="valor"
                    label="Valor Trajeto"
                    :error-messages="errors.collect('valor')"
                    v-validate="''"
                    data-vv-name="valor"
                    item-text="name"
                    disabled
                  ></v-text-field>
                </v-flex>
              </v-layout>
            </v-container>
            <small>*indica campo obrigatório</small>
          </v-card-text>
        </v-card>
      </v-dialog>
    </v-layout>
  </div>
</template>
<script src="src/components/servicos/despesa/_km.js"></script>