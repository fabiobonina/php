import {mapState, mapGetters, mapMutations} from 'vuex';
export default {
    template: `
<template>
    <section>
        <h2>Carro de la compra</h2>
        <h3>Total compra: {{ totalCompra.toFixed(2) }} € </h3>
        <ul>
            <li v-for="(producto, indice) in carro">
                {{ producto.nombre }}
                <button @click="eliminarProducto(indice)">X</button>
            </li>
        </ul>
    </section>
</template>
`,

        computed: {
            ...mapState(['carro']),
            ...mapGetters(['totalCompra']),
        },
        methods: mapMutations(['eliminarProducto'])
    }
