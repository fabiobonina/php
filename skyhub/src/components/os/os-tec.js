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
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
    loja()  {
      return store.getters.getLojaId(this.data.id);
    },
    _tecnicos() {
      return store.state.tecnicos;
    },
    _os()  {
      return store.getters.getOsId(this.data.id);
    },
  },
  created: function() {
    this.$store.dispatch('fetchProdutos').then(() => {
      console.log("Buscando dados dos produtos!")
    });
    this.dataT();
    this.addCategoria();
  },
  methods: {
    saveItem: function(){
      this.errorMessage = []

      if(this.checkForm()){
        this.isLoading = true
        var postData = {
          os: this.data.id,
          tecnicos: this.tecnicos,
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
              this.$store.dispatch("fetchOs").then(() => {
                console.log("Atualizando dados OS!")
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
          //this.$store.state.create(data)
      }
    },
    saveItem: function() {
      if(this.checkForm()){
        this.isLoading = true
        var postData = {
          categoria: this.categoria,
          loja: this.data.id
        };
        //console.log(postData);
        this.$http.post('./config/api/apiLoja.php?action=catCadastrar', postData).then(function(response) {
          //console.log(response);
          if(response.data.error){
            this.errorMessage = response.data.message;
            this.isLoading = false;
          } else{
            this.successMessage.push(response.data.message);
            this.isLoading = false;
            this.$store.dispatch("fetchIndex").then(() => {
              console.log("Atualizado lojas!")
            });
            setTimeout(() => {
              this.errorMessage = [];
              this.successMessage = [];
              this.categoria = [];
            }, 2000);
          }
        })
        .catch(function(error) {
          console.log(error);
        });
      }
    },
    catDelete: function(data) {
      if(confirm('Deseja realmente deletar ' + data.name + '?')){
        this.isLoading = true
        var postData = {
          id: data.id
        };
        //console.log(postData);
        this.$http.post('./config/api/apiLoja.php?action=catDelete', postData).then(function(response) {
          //console.log(response);
          if(response.data.error){
            this.errorMessage = response.data.message;
            this.isLoading = false;
          } else{
            this.successMessage.push(response.data.message);
            this.isLoading = false;
            this.$store.dispatch("fetchIndex").then(() => {
              console.log("Atualizado lojas!")
            });
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
    catStatus: function(data) {
      this.isLoading = true
      if(data.ativo == 0) this.ativo = '1';
      if(data.ativo == 1) this.ativo = '0';
      var postData = {
        ativo: this.ativo,
        id: data.id
      };
      //console.log(postData);
      this.$http.post('./config/api/apiLoja.php?action=catStatus', postData).then(function(response) {
        //console.log(response);
        if(response.data.error){
          this.errorMessage = response.data.message;
          this.isLoading = false;
        } else{
          this.successMessage.push(response.data.message);
          this.isLoading = false;
          this.$store.dispatch("fetchIndex").then(() => {
            console.log("Atualizado lojas!")
          });
          setTimeout(() => {
            this.errorMessage = [];
            this.successMessage = [];
          }, 2000);
        }
      })
      .catch(function(error) {
        console.log(error);
      });
    },
    checkForm:function(e) {
      this.errorMessage = [];
      if(!this.servico) this.errorMessage.push("Serviço necessário.");
      if(!this.dataOs) this.errorMessage.push("Data necessário.");
      if(!this.tecnico) this.errorMessage.push("Tecnico necessário.");
      if(!this.ativo) this.errorMessage.push("Ativo necessário.");
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    dataT() {
      var datetime = new Date().toLocaleString();
      var res = datetime.split(" ");
      var date = res[0].split("/");
      var time = res[1].slice(0, -3);
      var dtTime = date[2] + "-" + date[1] + "-" + date[0];
      this.dataOs = dtTime;
    },
    addCategoria: function () {
      if( this.data ) {
        this.categoria = this.data.categoria;
        this.bem = this.data.id;
      }
    }
  },
});