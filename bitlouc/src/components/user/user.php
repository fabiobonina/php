
<template id="user">
  <div>
      <v-dialog v-model="dialog2" max-width="500px">
      <v-card>
          <v-card-title>
            <span>User</span>
            <v-spacer></v-spacer>
            <v-menu bottom left>
              <v-btn icon slot="activator">
                <v-icon>more_vert</v-icon>
              </v-btn>
              <v-list>
              <v-list-tile avatar @click="">
                <v-list-tile-avatar>
                  <img :src="user.avatar">
                </v-list-tile-avatar>
                <v-list-tile-content>
                  <v-list-tile-title v-html="user.user"></v-list-tile-title>
                  
                  <v-list-tile-sub-title> {{ user.email }} </v-list-tile-sub-title>
                  <v-list-tile-sub-title> Mebro desde: {{ user.data }} </v-list-tile-sub-title>
                </v-list-tile-content>
              </v-list-tile>

                <v-list-tile @click="">
                  <v-list-tile-title>{{ user.user  }}</v-list-tile-title>
                  <v-list-tile-content>
                  <v-list-tile-title> {{ user.email }} </v-list-tile-title>
                </v-list-tile-content>
                </v-list-tile>
              </v-list>
            </v-menu>
          </v-card-title>
          <v-card-actions>
            <v-btn color="primary" flat @click.stop="dialog3=false">Close</v-btn>
          </v-card-actions>
        </v-card>
        <v-flex xs12 sm8>
          <v-card>
            <v-card-title class="cyan darken-1">
              <span class="headline white--text"> {{ user.user }} </span>
              <v-spacer></v-spacer>
              <v-btn dark icon>
                <v-icon>chevron_left</v-icon>
              </v-btn>
              <v-btn dark icon>
                <v-icon>edit</v-icon>
              </v-btn>
              <v-btn dark icon>
                <v-icon>more_vert</v-icon>
              </v-btn>
            </v-card-title>
            <v-list two-line>

              <v-list-tile @click="">
                <v-list-tile-action>
                  <v-icon>mail</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title> {{ user.email }} </v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
              <v-divider inset></v-divider>
              <v-list-tile @click="">
                <v-list-tile-action>
                  <v-icon>event</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                  <v-list-tile-title>Mebro desde: {{ user.data }}</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
            </v-list>
          </v-card>
        </v-flex>
      </v-dialog>
    <div class="modal is-active">
      <div class="modal-background"></div>
      <div class="modal-content">
        <div class="box">
          <article class="media">
            <div class="media-left">
              <figure class="image is-64x64 avatar">
                <img :src="user.avatar" alt="Image">
              </figure>
            </div>
            <div class="media-content">
              <div class="content">
                <p>
                  <strong>{{ user.user }}</strong> 
                  <br>
                  {{ user.name }}
                  <br>
                  <small> {{ user.email }} </small> <small>Mebro desde: {{ user.data }}</small>
                </p>
              </div>
              <nav class="level is-mobile">
                <div class="level-left">
                  <a href="?sair" onClick="return confirm('Deseja realmente sair do Sistema?')" class="level-item button is-danger">Sign out</a>
                </div>
              </nav>
            </div>
          </article>
        </div>
      </div>
      <button class="modal-close is-large" aria-label="close" v-on:click="$emit('close')"></button>
    </div>
  </div>
</template>