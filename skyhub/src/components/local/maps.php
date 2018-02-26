<template id="vue-map">
    <div>
        <div class="columns">
            <div class="column">
                <p class="control has-icons-right">
                  <input class="input" v-model="search" type="text" placeholder="Filtar localidade">
                  <span class="icon is-small is-right">
                    <span class="mdi mdi-filter"></span>
                  </span>
                </p>
                <h2 v-if="noVisibleMarkers">Não há lojas na visualização atual. Listando lojas em 400 km de raio da sua localização:</h2>
                <ul class="" id="results-list" v-if="currentZoom > zoomTreshold || search">
                    <li v-for="(marker, i) in visibleMarkers">
                        <strong>{{ marker.loja }}, {{ marker.name }}</strong><br/>
                        <span> {{ marker.local}}</span><br/>
                        <span v-if="currentLocation">distância da sua localização: {{ Math.round(marker.distanceFromCenter / 1000) + ' km' }}<br/></span>
                        <span>lat: {{ marker.position.lat() }}</span><br/>
                        <span>lng: {{ marker.position.lng() }}</span>
                        <button v-bind:data-id='marker.id' @click='centerMapToMarker'>show on map</button>
                    </li>
                </ul>
                <h2 v-else>O sue ponto de visualização contém {{ visibleMarkers.length }} localidades,
                    se você quiser mostrar locais específicos, faça o zoom ou digite sua solicitação no campo de pesquisa.
                </h2>
            </div>
            <div class="column is-three-quarters">
                <p class="control has-icons-right">
                  <input class="input" id="autocompleteInput" type="text"placeholder="Informar localidade">
                  <span class="icon is-small is-right">
                    <i class="material-icons">my_location</i>
                  </span>
                </p>
                <div id="map_canvas2"></div>
                <button @click='addUluru'>Adicionar Uluru</button>
            </div>
        </div>
    </div>
</template>