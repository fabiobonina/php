Vue.component('loja-add', {
  name: 'loja-add',
  template: '#loja-add',
  data: function () {
    return {
      errorMessage: [],
      successMessage: [],
      isLoading: false,
      nick:'', name:'', proprietario:'', grupoLoja:'', seguimento:'', data:'', ativo:'',
    }
  },
  computed: {
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
  },
  methods: {
    registrar: function() {
      if(this.checkForm()){
        this.isLoading = true
        var postData = {
          nick: this.nick,
          name: this.name,
          grupoLoja: this.grupoLoja,
          seguimento: this.seguimento,
          data: this.data,
          ativa: this.ativa
        };
        //console.log(postData);
        this.$http.post('./config/api/apiUser.php?action=registrar', postData).then(function(response) {
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
      }
    },
    checkForm:function(e) {
      this.errorMessage = [];
      if(!this.name) this.errorMessage.push("Nome necessário.");
      if(!this.user) this.errorMessage.push("Usuario necessário.");
      if(!this.email) {
        this.errorMessage.push("Email necessário.");
      } else if(!this.validEmail(this.email)) {
        this.errorMessage.push("Email válido necessário.");
      } else if(this.email !== this.emailR) {
        this.errorMessage.push("Email não é igual a confirmação.");
      }
      if(!this.password) {
        this.errorMessage.push("Password necessário.");
      } else if(this.password !== this.passwordR) {
        this.errorMessage.push("Password não é igual a confirmação.");        
      }
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    validEmail:function(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }
  }
});