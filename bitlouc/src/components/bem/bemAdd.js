Vue.component('bem-add', {
  name: 'bem-add',
  template: '#bem-add',
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      produto: {}, name: '', modelo: '', numeracao:'', modelo:'',
      fabricante: {}, categoria: '', plaqueta: '', dataFab: '', dataCompra: '', ativa: '',
      isLoading: false
    };
  },
  props: {
    title: { type: String, default: '' },
    message: { type: String, default: 'Confirm' },
    data: {}
  },
  computed: {
    temErros () {
      return this.errorMessage.length > 0
    },
    temMessage () {
      return this.successMessage.length > 0
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
  },
  methods: {
    saveItem: function(){
      this.errorMessage = []
      if(this.formValido()){
        this.isLoading = true
        //const data = {'id': this.data.id, 'modelo': this.modelo
        //'cadastro': new Date().toJSON() }
        var postData = {
          produtoId: this.produtos.id,
          produtoTag: this.produtos.tag,
          name: this.name,
          modelo: this.modelo,
          numeracao: this.numeracao,
          fabricante: this.fabricante,
          categoria: this.categoria.id,
          plaqueta: this.plaqueta,
          dataFab: this.dataFab,
          dataCompra: this.dataCompra,
          loja: this.$route.params._id,
          produto: this.produto,
          tag: this.tag,
          name: this.name,
          capacidade: this.capacidade,
          unidade: this.unidade,
          latitude: geoposicao[0],
          longitude: geoposicao[1],
          ativo: '0'
        };
        //var formData = this.toFormData(postData);
        //console.log(postData);
        this.$http.post('./config/api/apiLocalFull.php?action=cadastrar', postData)
          .then(function(response) {
            //console.log(response);
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
      if(this.produto.length == 0 || this.capacidade.length == 0 || this.unidade.length == 0 || this.fabricante.length == 0 ){
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