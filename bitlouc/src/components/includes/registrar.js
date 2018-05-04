const { v4 } = uuid;
Vue.use(VeeValidate)

Vue.component('register', {
  name: 'register',
  template: '#register',
  $_veeValidate: {
    validator: 'new'
  },
  data: function () {
    return {
      errorMessage: [],
      successMessage: [],
      isLoading: false,
      e1: true,
      id: v4(),
      name:'', email:'', emailR:'', user:'', password:null, passwordR:null,
      dictionary: {
        attributes: {
          email: 'E-mail',
          emailR: 'E-mail Confime',
          password: 'Senha',
          passwordR: 'Senha Confime'
          // custom attributes
        },
        custom: {

        }
      }
    }
  },
  mounted () {
    this.$validator.localize('pt_BR', this.dictionary)
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
				this.$validator.validateAll().then((result) => {
          if (result) {
            this.isLoading = true
            var postData = {
              name: this.name,
              user: this.user,
              email: this.email,
              password: this.password
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
  
        });
      /*if( this.$validator.validateAll() ){
        console.log(this.$validator.validateAll().PromiseValue)
        
      }*/
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