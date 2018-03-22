Vue.component('os-tec', {
  name: 'os-tec',
  template: '#os-tec',
  props: {
    data: Object
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      item:{},
      tecnicos: null,
      isLoading: false,
    };
  },
  computed: {
    temMessage() {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
    loja() {
      return store.getters.getLojaId(this.data.id);
    },
    _tecnicos() {
      return store.state.tecnicos;
    },
    _os() {
      return store.getters.getOsId(this.data.id);
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
          os: this.data.id,
          loja: this.data.loja,
          tecnicos: this.tecnicos,
        };
        //var formData = this.toFormData(postData);
        //console.log(postData);
        this.$http.post('./config/api/apiOsTec.php?action=osTecAdd', postData)
          .then(function(response) {
            console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.atualizacao();
              this.isLoading = false;
              setTimeout(() => {
                this.errorMessage = null;
                this.successMessage = null;
                this.tecnicos = null;
              }, 2000);
            }
          })
          .catch(function(error) {
            console.log(error);
          });
          //this.$store.state.create(data)
      }
    },
    tecDelete: function(data) {
      if(confirm('Deseja realmente deletar ' + data.user + '?')){
        this.isLoading = true
        var postData = {
          id: data.id,
          os: this.data.id,
        };
        //console.log(postData);
        this.$http.post('./config/api/apiOsTec.php?action=osTecDel', postData).then(function(response) {
          //console.log(response);
          if(response.data.error){
            this.errorMessage.push( response.data.message);
            this.isLoading = false;
          } else{
            this.successMessage.push(response.data.message);
            this.isLoading = false;
            this.atualizacao();
            setTimeout(() => {
              //this.$emit('close');
              this.errorMessage = [];
              this.successMessage = [];
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
      if(!this.tecnicos) this.errorMessage.push("Tecnicos necessário.");
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    atualizacao: function(){
      this.$store.dispatch("fetchOs").then(() => {
        console.log("Atualizando dados OS!")
      });
    },
  },
});