const loginTpl = `
  <form @submit.prevent="login()">
   <input type="text" placeholder="email" v-model="email">
   <input type="password" placeholder="password" v-model="password">
   <button type="submit">Login</button>
  </form>
 
`

Vue.component('login', {
    name: 'login',
    template: 'login',
    data: function () {
      return {
        errorMessage: [],
        successMessage: [],
        isLoading: false,
        email:'', password:'',
        dialog: false,
        dialog2: false,
        dialog3: false,
        notifications: false,
        sound: true,
        widgets: false,
        
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
      logar: function() {
        if(this.checkForm()){
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
  