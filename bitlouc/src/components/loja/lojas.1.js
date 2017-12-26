var List = Vue.extend({
    template: '#list',
    data: function () {
      return {
        errorMessage: '',
        successMessage: '',
        searchQuery: '',
        gridColumns: ['displayName', 'name']
      };
    },
    created() {
      store.dispatch("fetchUsers", { self: this });
      this.$store.dispatch("fetchUser").then(() => {
        console.log("Isso seria impresso após o envio!!")
      });
    },
    computed: {
      proprietario() {
        return store.state.proprietario;
      },
      lojas() {
        return store.state.lojas;
      },
    },
    methods: {
      onSubmit: function() {
        if (!this.name || !this.surname) {
          alert('Lütfen tüm alanları doldurunuz!');
          return false;
        }
        var postData = {name: this.name, surname: this.surname};
        this.$http.post('../api/api.php', postData)
          .then(function(response) {
            if (response.body.status == 'ok') {
              this.users.push(response.body.users);
            }
            this.name = '';
            this.surname = '';
          })
          .catch(function(error) {
            console.log(error);
          });
      },
      filterUsers() {
        //do something with users
         console.log("Users--->", store.state.loja)       
      }
    }
  });
  