Vue.component('os-add', {
  name: 'os-add',
  template: '#os-add',
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      item:{}, servico: {}, tecnico: [], dataOs: '', ativa: '',
      isLoading: false,
      newTodoText: '',
      todos: [
        {id: 1, name: 'Do the dishes', },
        {id: 2, name: 'Take out the trash', },
        {id: 3, name: 'Mow the lawn'}
      ],
      nextTodoId: 4
    };
  },
  props: {
    data: {}
  },
  computed: {
    temMessage () {
      if(this.errorMessage.length > 0){
        return true
      }
      if(this.successMessage.length > 0){
        return true
      }
      return false
    },
    loja()  {
      return store.getters.getLojaId(this.$route.params._id);
    },
    local()  {
      return store.getters.getLocalId(this.$route.params._local);
    },
    servicos() {
      return store.state.servicos;
    },
    tecnicos() {
      return store.state.tecnicos;
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
          loja: this.loja.id,
          lojaNick: this.loja.nick,
          local: this.local.id,
          bem: this.data.id,
          categoria: this.data.categoria,
          servico: this.servico.id,
          tipoServ: this.servico.tipo,
          tecnicos: this.tecnico,
          data: this.dataOs,
          dtCadastro: new Date().toJSON(),
          estado: '0',
          processo: '0',
          status: '0',
          ativo: '0'
        };
        //var formData = this.toFormData(postData);
        console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=cadastrar', postData)
          .then(function(response) {
            console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.isLoading = false;
              setTimeout(() => {
                this.$emit('atualizar');
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
      if(this.servico.length == 0 || this.data.length == 0 || this.tecnico.length == 0 ){
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
    },
    addNewTodo: function () {
      this.tecnico.push(this.item)
      this.item = {}
    }
  },
});