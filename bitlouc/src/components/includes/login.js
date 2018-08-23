Vue.use(VeeValidate)
Vue.component('login', {
  name: 'login',
  template: '#login',

  $_veeValidate: {
      validator: 'new'
  },

  data: function () {
    return {
      errorMessage: [],
      successMessage: [],
      e1: true,
      email:'', password:'',
      dictionary: {
        attributes: {
          email: 'E-mail'
          // custom attributes
        },
        custom: {
        }
      }
    };
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
    user() {
      return store.state.user;
    },    
    ...Vuex.mapGetters(["isLoggedIn"]),
  },
  methods: {
    logar: function() {
      this.$validator.validateAll().then((result) => {
        if (result) {
          this.isLoading = true
          var postData = {
            email: this.email,
            password: this.password
          };
          
          this.$http.post('./config/api/apiUser.php?action=logar', postData).then(function(response) {
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              //this.$store.dispatch('setUser', response.data.dados);
              setTimeout(() => {
                if(response.data.isLoggedIn){
                localStorage.setItem("isLoggedIn", btoa( response.data.isLoggedIn ))
                this.$store.dispatch("login", {
                    isLoggedIn: response.data.isLoggedIn,
                    token: response.data.token,
                    user: response.data.dados
                }).then(res => {
                  this.$emit('atualizar');
                  this.$router.push( this.$route.fullPath );
                })
               }
              
                //localStorage.setItem("isLoggedIn", btoa( response.data.isLoggedIn ))
                //localStorage.setItem("token", btoa( response.data.token ));
                //this.$router.push(this.$route.fullPath);
                //console.log('teste');
              }, 2000);
            }
          })
          .catch(function(error) {
            console.log(error);
          });

        }

      });

    },
    checkForm:function(e) {
      this.errorMessage = [];
      if(!this.email) {
        this.errorMessage.push("Email necessário.");
      } else if(!this.validEmail(this.email)) {
        this.errorMessage.push("Email válido necessário.");
      }
      if(!this.password) this.errorMessage.push("Password necessário.");
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    validEmail:function(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }
  }
});