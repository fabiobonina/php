<template id="vue-map">
    <div>
    
    <v-layout row wrap>
        <v-flex xs8>
          <div>
          <input id="autocompleteInput" type="text"placeholder="Informar localidade">
                  <span class="icon is-small is-right">
                    <i class="material-icons">my_location</i>
                  </span>
                  <div id="map_canvas2"></div>
                <button @click='addUluru'>Adicionar Uluru</button>
          </div>
        </v-flex>

        <v-flex xs4>
          <div>
            <input v-model="search" type="text" placeholder="Filtar localidade">
            <span class="icon is-small is-right">
                <span class="mdi mdi-filter"></span>
            </span>
                <template>
                        <v-card>
                            <v-toolbar color="blue" dark>
                            <v-toolbar-side-icon></v-toolbar-side-icon>
                            <v-toolbar-title>Inbox</v-toolbar-title>
                            <v-spacer></v-spacer>
                            <v-btn icon>
                                <v-icon>search</v-icon>
                            </v-btn>
                            <v-btn icon>
                                <v-icon>check_circle</v-icon>
                            </v-btn>
                            </v-toolbar>
                            <h4 v-if="noVisibleMarkers">Não há locais na visualização atual.
                            Listando locais em 400 km de raio da sua localização:</h4>
                            <v-list two-line id="results-list" v-if="currentZoom > zoomTreshold || search">
                            <template v-for="(marker, i) in visibleMarkers">
                                <v-list-tile
                                :key="marker.id"
                                avatar
                                ripple
                                v-bind:data-id='marker.id'
                                @click="centerMapToMarker"
                                >
                                <v-list-tile-content>
                                    <v-list-tile-title>{{ marker.loja }}, {{ marker.name }}</v-list-tile-title>
                                    <v-list-tile-sub-title class="text--primary">{{ marker.local}}</v-list-tile-sub-title>
                                    <v-list-tile-sub-title>{{  }}</v-list-tile-sub-title>
                                </v-list-tile-content>
                                <v-list-tile-action>
                                    <v-list-tile-action-text>{{ Math.round(marker.distanceFromCenter / 1000) + ' km' }}</v-list-tile-action-text>

                                    <v-icon
                                    v-else
                                    color="yellow darken-2"
                                    >star</v-icon>
                                    <button v-bind:data-id='marker.id' @click='centerMapToMarker'><span class="mdi mdi-map-marker-radius"></span>Ver Maps</button>
                                </v-list-tile-action>
                                </v-list-tile>
                                <v-divider v-if="index + 1 < visibleMarkers.length" :key="index"></v-divider>
                                
                            </template>
                            </v-list>
                            <h4 v-else>O sue ponto de visualização contém {{ visibleMarkers.length }} localidades,
                                se você quiser mostrar locais específicos, faça o zoom ou digite sua solicitação no campo de pesquisa.
                            </h4>
                        </v-card>

                    </template>
          </div>
        </v-flex>
      </v-layout>
    </div>
</template>

<script src="src/components/local/maps.js"></script>