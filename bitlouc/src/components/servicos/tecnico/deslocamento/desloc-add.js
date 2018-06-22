Vue.component('desloc-add', {
  name: 'desloc-add',
  template: '#desloc-add',
  props: {
    data: Object,
    dialog: Boolean
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      tecnico: null,
      tecnicos: null,
      status: null,
      trajeto: null,
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
    deslocTrajetos() {
      return store.state.deslocTrajetos;
    },
    deslocStatus: function () {
      return data = store.state.deslocStatus;
    }
  },
  methods: {
    saveItem: function(){
      this.errorMessage = []
      if(this.checkForm()){
        this.isLoading = true
        if(this.trajeto.categoria == '0'){
          this.valor  = '0';
        }else if( this.trajeto.categoria == '1'){
          this.km     = '0';
        }else if( this.trajeto.categoria == '2' ){
          this.km     = '0';
          this.valor  = '0';
        }
        var postData = {
          os: this.data.id,
          tecnico: this.tecnico,
          tecnicos: this.tecnicos,
          trajeto: this.trajeto,
          status: this.status,
          date: this.date,
          km: this.km,
          valor: this.valor
        };
        //console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=desloc', postData)
          .then(function(response) {
            console.log(response);
            if(response.data.error){
              this.errorMessage.push(response.data.message);
              this.isLoading = false;
            } else{
              this.successMessage.push(response.data.message);
              this.isLoading = false;
              this.$store.dispatch("fetchOs").then(() => {
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
      if(!this.tecnico) this.errorMessage.push("Tecnicos necessário.");
      if(!this.status) this.errorMessage.push("Status necessário.");
      if(!this.date) this.errorMessage.push("Data necessário.");
      if(!this.trajeto) this.errorMessage.push("Tipo necessário.");
      if(this.trajeto.categoria == '0'){
        if( !this.km )this.errorMessage.push("Para o Trajeto escolhido o Km é necessário.");
      }else if ( this.trajeto.categoria == '1' ) {
        if( !this.valor )this.errorMessage.push("Para o Trajeto escolhido o Valor é necessário.");
      }
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    dataT() {
      var datetime = new Date().toLocaleString();
      var res = datetime.split(" ");
      var date = res[0].split("/");
      var time = res[1].slice(0, -3);
      var dtTime = date[2] + "-" + date[1] + "-" + date[0] + "T" + time;
      this.date = dtTime;
    },
  },
});