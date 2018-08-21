Vue.component('bem-add', {
  name: 'bem-add',
  template: '#bem-add',
  props: {
    data: {},
    filterKey: String
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      produto: null, modelo: '', numeracao:'', modelo:'', fabricante: null,
      categoria: null, plaqueta: '', dataFab: '', dataCompra: '', ativo: '',
      isLoading: false,
      item:{},
    };
  },  
  computed: {
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
    loja()  {
      return store.getters.getLojaId(this.$route.params._id);
    },
    local()  {
      return store.getters.getLocalId(this.$route.params._local);
    },
    produtos() {
      return store.state.produtos;
    },
    fabricantes() {
      return store.state.fabricantes;
    },
    categorias() {
      return store.state.categorias;
    },
  },
  created: function() {
    this.$store.dispatch('fetchProdutos').then(() => {
      console.log("Buscando dados dos produtos!")
    });
  },
  methods: {
    saveItem: function(){
      this.errorMessage = []
      if(this.checkForm()){
        this.isLoading = true
        var postData = {
          produto: this.produto.id,
          tag: this.produto.tag,
          name: this.produto.name,
          modelo: this.modelo,
          numeracao: this.numeracao,
          fabricante: this.fabricante.id,
          fabricanteNick: this.fabricante.nick,
          proprietario: this.loja.id,
          proprietarioNick: this.loja.nick,
          proprietarioLocal: this.local.id,
          categoria: this.categoria.id,
          plaqueta: this.plaqueta,
          dataFab: this.dataFab,
          dataCompra: this.dataCompra,
          ativo: this.ativo
        };
        console.log(postData);
        this.$http.post('./config/api/apiBem.php?action=cadastrar', postData)
          .then(function(response) {
          console.log(response);
          if(response.data.error){
            this.errorMessage.push(response.data.message);
            this.isLoading = false;
          } else{
            this.successMessage.push(response.data.message);
            this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
              console.log("Atulizando dados das localidades!")
            });
            this.isLoading = false;
            setTimeout(() => {
              this.$emit('close');
            }, 2000);  
          }
        })
        .catch(function(error) {
          console.log(error);
        });
      }
    },
    checkForm:function(e) {
      this.errorMessage = [];
      if(!this.categoria) this.errorMessage.push("Categoria necessário.");
      if(!this.produto) this.errorMessage.push("Produto necessário.");
      if(!this.modelo) this.errorMessage.push("Modelo necessário.");
      if(!this.fabricante) this.errorMessage.push("Municipio necessário.");
      if(!this.ativo) this.errorMessage.push("Ativo necessário.");
      if(!this.dataCompra) this.errorMessage.push('data compra necessário!');
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
  },
});