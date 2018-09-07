<template  id="bem-add">
  <div>
    <v-dialog v-model="dialog" max-width="500px">
      <v-btn slot="activator" color="pink" small fab dark class="mb-2">
        <v-icon>add</v-icon>
      </v-btn>
      <v-card>
        <v-card-title>
          <span class="headline">{{ formTitle }}</span>
        </v-card-title>

        <v-card-text>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12 sm6 md4>
                <v-text-field v-model="editedItem.name" label="Dessert name"></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4>
                <v-text-field v-model="editedItem.calories" label="Calories"></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4>
                <v-text-field v-model="editedItem.fat" label="Fat (g)"></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4>
                <v-text-field v-model="editedItem.carbs" label="Carbs (g)"></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4>
                <v-text-field v-model="editedItem.protein" label="Protein (g)"></v-text-field>
              </v-flex>
            </v-layout>
          </v-container>
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" flat @click.native="close">Cancel</v-btn>
          <v-btn color="blue darken-1" flat @click.native="save">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <div>
    <v-dialog v-model="dialogdel" persistent scrollable max-width="500px">
      <v-card>
        <v-card-title color="primary">
          <span class="headline">Deletar</span>
        </v-card-title>
        <v-card-text>
          <message :success="successMessage" :error="errorMessage"></message>
          <loader :dialog="isLoading"></loader>
          <v-form>
            <h1 class="headline"> {{  }} </h1>
          </v-form>
        </v-card-text>
        <v-card-actions>
            <v-btn flat @click.stop="$emit('close')">Fechar</v-btn>
            <v-spacer></v-spacer>
            <v-btn color="error" flat @click="deleteItem(data)">Deletar</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
  </div>
</template>
<script>
Vue.component('bem-add', {
  name: 'bem-add',
  template: '#bem-add',
  props: {
    data: {},
    dialogedt: Boolean,
    dialogdel: Boolean,
  },
  data: () => ({
    errorMessage: [],
    successMessage: [],
    isLoading: false,
    dialog: this.dialogedt,
    desserts: [],
    editedIndex: -1,
    
  }),

  computed: {
    formTitle () {
      return this.editedIndex === -1 ? 'Novo Equipamento' : 'Editar Equipamento'
    }
  },

  watch: {
    dialog (val) {
      val || this.close()
    }
  },

  created () {
    //this.initialize()
  },

  methods: {
    
    editItem (item) {
      this.editedIndex = this.desserts.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialog = true
    },

    deleteItem (item) {
      const index = this.desserts.indexOf(item)
      confirm('Tem certeza de que deseja excluir este item?') && this.desserts.splice(index, 1)
    },

    close () {
      this.dialog = false
      setTimeout(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
        this.$emit('close');
      }, 300)
    },

    save () {
      if (this.editedIndex > -1) {
        Object.assign(this.desserts[this.editedIndex], this.editedItem)
      } else {
        this.desserts.push(this.editedItem)
      }
      this.close()
    }
  }
})
</script>