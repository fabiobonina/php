
<template id="user">
  <div>
    <v-dialog v-model="dialog2" max-width="500px">
      <v-card>
        <v-card-title>
          <span>User: {{ user.user }} </span>
          <v-spacer></v-spacer>
          
        </v-card-title>
        <v-container fill-height fluid>
          <v-list>
            <v-list-tile avatar @click="">
              <v-list-tile-avatar>
                <img :src="user.avatar">
              </v-list-tile-avatar>
              <v-list-tile-content>
                <v-list-tile-title>{{ user.name }}</v-list-tile-title>
                <v-list-tile-sub-title> {{ user.email }} </v-list-tile-sub-title>
                <v-list-tile-sub-title> Mebro desde: {{ user.data }} </v-list-tile-sub-title>
              </v-list-tile-content>
            </v-list-tile>
          </v-list>
        </v-container>
        <v-card-actions>
          <v-btn color="primary" flat @click.stop="$emit('close')">Close</v-btn>
          <v-spacer></v-spacer>
          <v-btn color="primary" @click.stop="dialog3=false">Sign out</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>