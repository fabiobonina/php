Vue.component('desloc-chg', {
  name: 'desloc-chg',
  template: '#desloc-chg',
  props: {
    data: Object
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      tecnicos: null,
      status: null,
      tipo: null,
      km: '',
      date: '',
      dtInicio: '', kmInicio:'', kmFinal:'',  dtDesloc: '', valor: '', tempo: '',
      isLoading: false,
    };
  },
  
  created: function() {
    this.dataT()
  },
  computed: {
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
    deslocTipos() {
      return store.state.deslocTipos;
    },
    deslocStatus: function () {
      var filterKey = this.data.processo
      var data = store.state.deslocStatus
      return data = data.filter(function (row) {
        return row.categoria <= filterKey;
      });
    }
  },
  methods: {
    saveItem: function(){
      this.errorMessage = []
      if(this.checkForm()){
        this.isLoading = true
        if(this.tipo.categoria == '0'){
          this.valor = '0';
        }else{
          this.km = '0';
        }
        var postData = {
          os: this.data.id,
          tecnicos: this.tecnicos,
          tipo: this.tipo,
          status: this.status,
          date: this.date,
          km: this.km,
          valor: this.valor
        };
        console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=deslocamento', postData)
          .then(function(response) {
            alert(response.data);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.isLoading = false;
              this.$store.dispatch("findOs").then(() => {
                console.log("Buscando dados OS!")
              });
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
      if(!this.tecnicos) this.errorMessage.push("Tecnicos necessário.");
      if(!this.status) this.errorMessage.push("Status necessário.");
      if(!this.dtInicio) this.errorMessage.push("Data necessário.");
      if(!this.km && !this.valor) this.errorMessage.push("Km ou Valor necessário.");
      if(!this.tipo) this.errorMessage.push("Tipo necessário.");
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    dataT() {
      var datetime = new Date().toLocaleString();
      var res = datetime.split(" ");
      var date = res[0].split("/");
      var time = res[1].slice(0, -3);
      var dtTime = date[2] + "-" + date[1] + "-" + date[0] + "T" + time;
      this.dtInicio = dtTime;
      this.date = dtTime;
    },
  },
});