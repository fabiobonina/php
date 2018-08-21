<!DOCTYPE html>
<html>
<head>
  <title>Vuetify Blog Starter</title>
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
  <link href="https://unpkg.com/vuetify@1.1.0-alpha.1/dist/vuetify.css" rel="stylesheet">
</head>
<body>
 <div id="app">
  <v-app light>
    <v-content>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="primary">
                <v-toolbar-title>Login form</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-tooltip bottom>
                  <v-btn
                    icon
                    large
                    :href="source"
                    target="_blank"
                    slot="activator"
                  >
                    <v-icon large>code</v-icon>
                  </v-btn>
                  <span>Source</span>
                </v-tooltip>
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field prepend-icon="person" name="login" label="Login" type="text"></v-text-field>
                  <v-text-field prepend-icon="lock" name="password" label="Password" id="password" type="password"></v-text-field>
                  <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12>
                <div v-else>
                  <v-autocomplete
                    :items="categorias"
                    v-model="categoria"
                    item-text="name"
                    label="Cagetoria"
                    return-object
                    required
                  ></v-autocomplete>
                </div>
              </v-flex>
              <v-flex xs12 sm6 md5>
                <v-text-field
                  type="date"
                  v-model="dataOs"
                  label="Data"
                  item-text="name"
                  required
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md7>
                <v-autocomplete
                  :items="servicos"
                  v-model="servico"
                  item-text="name"
                  label="Serviços"
                  return-object
                  required
                ></v-autocomplete>
              </v-flex>
              
              <v-flex xs12>
                <v-autocomplete
                  :items="tecnicos"
                  v-model="tecnico"
                  label="Tecnico"
                  item-text="userNick"
                  multiple
                  chips
                  return-object
                  max-height="auto"
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

                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary">Login</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
  </v-app>
 </div>
 <script src="https://unpkg.com/vue/dist/vue.js"></script>
 <script src="https://unpkg.com/vuetify@1.1.0-alpha.1/dist/vuetify.js"></script>
 <script src="https://use.fontawesome.com/73c8e2621d.js"></script>
 <script>
   new Vue({
    el: '#app',
    data () {
      return {
        title: 'Your Logo',
        posts: [
          {
            title: 'Fusce ullamcorper tellus',
            content: 'Fusce ullamcorper tellus sed maximus rutrum. Donec imperdiet ultrices maximus. Donec non tellus non neque pellentesque fermentum. Aenean in pellentesque urna.',
            imgUrl: 'https://raw.githubusercontent.com/vuetifyjs/docs/dev/static/doc-images/cards/drop.jpg'
          },
          {
            title: 'Donec vitae suscipit lectus, a luctus diam.',
            content: 'Donec vitae suscipit lectus, a luctus diam. Proin vitae felis gravida, lobortis massa sit amet, efficitur erat. Morbi vel ultrices nisi.',
            imgUrl: 'https://raw.githubusercontent.com/vuetifyjs/docs/dev/static/doc-images/cards/docks.jpg'
          },
          {
            title: 'Vestibulum condimentum quam',
            content: 'At sagittis sapien vulputate. Vivamus laoreet lacus id magna rutrum dapibus. Donec vel pellentesque arcu. Maecenas mollis odio tempus felis elementum commodo.',
            imgUrl: 'https://raw.githubusercontent.com/vuetifyjs/docs/dev/static/doc-images/cards/plane.jpg'
          }
        ],
        item:{},
      servico: null, tecnico: null, dataOs: '', ativo: '0',
      isLoading: false,
      bem: null,
      categoria: null
      }
    },
    computed: {
    temMessage () {

    },
    loja()  {
    },
    local()  {
    },
    servicos() {
    },
    tecnicos() {
    },
    categorias() {
    },
    filterServ: function () {
      
    }
  },
  })
 </script>
</body>
</html>
