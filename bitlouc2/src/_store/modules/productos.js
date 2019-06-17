const productos = {

    mutations: {
        anadirProducto: (state, producto) => state.productos.unshift(producto),
    },
    state: {
        productos : [
            {nombre: 'Steam Link', precio: 50},
            {nombre: 'Steam Controller', precio: 59},
            {nombre: 'Axiom Verge', precio: 17},
        ]
    },
}


/*export default {
    state: productos,
    mutations,
};*/