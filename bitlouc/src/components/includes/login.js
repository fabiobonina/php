Vue.use(VeeValidate)
Vue.component('login', {
  name: 'login',
  template: '#login',

  $_veeValidate: {
      validator: 'new'
  },

  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      valid: true,     
      e1: true,
      email:'', password:'',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
      ],
      dictionary: {
        attributes: {
          email: 'Endereço de e-mail'
          // custom attributes
        },
        custom: {
          name: {
            required: () => 'O nome não pode estar vazio',
            max: 'O campo de nome não pode ter mais de 10 caracteres'
            // custom messages
          },
        }
      }
    };
  },
  mounted () {
    this.$validator.localize('en', this.dictionary)
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
      if(this.$validator.validateAll() ){
        this.isLoading = true
        //const data = {'id': this.data.id, 'modelo': this.modelo
        //'cadastro': new Date().toJSON() }
        var postData = {
          email: this.email,
          password: this.password
        };
        //var formData = this.toFormData(postData);
        this.$http.post('./config/api/apiUser.php?action=logar', postData)
          .then(function(response) {
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.isLoading = false;
              setTimeout(() => {
                window.location.href = "./index.php";
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