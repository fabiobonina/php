Vue.component('os-amarrac', {
  name: 'os-amarrac',
  template: '#os-amarrac',
  props: {
    data: {}
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      filial: null,
      os: null,
      isLoading: false,
      filiais: [
        {id:'1', name: 'PE'},
        {id:'3', name: 'CE'},
        {id:'4', name: 'GO'},
        {id:'5', name: 'SBO'},            
      ]
    };
  },
  computed: {
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    }
  },
  methods: {
    saveItem: function(){
      this.errorMessage = []
      if(this.checkForm()){
        this.isLoading = true
        var postData = {
          id: this.data.id,
          os: this.os,
          filial: this.filial.id,
          status: '1'
        };        
        this.$http.post('./config/api/apiOs.php?action=osAmarar', postData)
          .then(function(response) {
            //console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.isLoading = false;
              this.atualizacao();
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
      if(!this.filial) this.errorMessage.push("Filial necessário.");
      if(!this.os) this.errorMessage.push("OS necessário.");
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    atualizacao: function(){
      this.$store.dispatch("findOs").then(() => {
        console.log("Atualizando dados OS!")
      });
    },
  },
});