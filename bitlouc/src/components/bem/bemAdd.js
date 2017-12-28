Vue.component('bem-add', {
  name: 'bem-add',
  template: '#bem-add',
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      produto: {}, modelo: '', numeracao:'', modelo:'',
      fabricante: {}, categoria: '', plaqueta: '', dataFab: '', dataCompra: '', ativa: '',
      isLoading: false
    };
  },
  props: {
    data: {}
  },
  computed: {
    temErros () {
      return this.errorMessage.length > 0
    },
    temMessage () {
      return this.successMessage.length > 0
    },
    proprietario() {
      return store.state.produtos;
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
      if(this.formValido()){
        this.isLoading = true
        //const data = {'id': this.data.id, 'modelo': this.modelo
        //'cadastro': new Date().toJSON() }
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
          ativo: '0'
        };
        //var formData = this.toFormData(postData);
        console.log(postData);
        this.$http.post('./config/api/apiBemFull.php?action=cadastrar', postData)
          .then(function(response) {
            console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.isLoading = false;
              setTimeout(() => {
                this.$emit('close');
              }, 2000);  
            }
          })
          .catch(function(error) {
            console.log(error);
          });
          //this.$store.state.create(data)
      }
    },
    ehVazia () {
      if(this.produto.length == 0 || this.modelo.length == 0 || this.fabricante.length == 0 || this.categoria.length == 0 || this.dataCompra.length == 0){
          this.errorMessage.push('Por favor, preencha os campos obrigatorio *')
          return true
      }
      return false
    },
    formValido(){
        if(this.ehVazia()){
            return false
        }
        return true
    }
  },
});