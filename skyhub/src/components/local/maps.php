<template id="vue-map">
    <div>
        <input id="autocompleteInput" type="text"placeholder="Enter a location">
        <div id="map_canvas2"></div>
        <button @click='addUluru'>Adicionar Uluru</button>
        <h2 v-if="noVisibleMarkers">Não há lojas no modo de exibição atual. Listagem de lojas em 400km RADIUS a partir de sua localização:</h2>
        <ul class="" id="results-list" v-if="currentZoom > zoomTreshold">
        <li v-for="(marker, i) in visibleMarkers">
            <strong>{{ marker.name }}</strong><br/>
            <span>é Boutique: {{ marker.boutique ? 'yes' : 'no'}}</span><br/>
            <span v-if="currentLocation">distância da sua localização: {{ Math.round(marker.distanceFromCenter / 1000) + ' km' }}<br/></span>
            <span>lat: {{ marker.position.lat() }}</span><br/>
            <span>lng: {{ marker.position.lng() }}</span>
            <button v-bind:data-id='marker.id' @click='centerMapToMarker'>show on map</button>
        </li>
        </ul>
        <h2 v-else>A sua porta de visualização contém {{ visibleMarkers.length }} lojas, se você quiser mostrar lojas específicas, por favor, amplie ou digite sua solicitação no campo de pesquisa.</h2>
    </div>
</template>