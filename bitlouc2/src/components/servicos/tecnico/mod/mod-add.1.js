Vue.component('mod-add', {
  name: 'mod-add',
  template: '#mod-add',
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
      dtInicio: '',
      dtFinal:  '',
      kmInicio: '',
      kmFinal:  '',
      tempo:    '',
      hhValor:  '',
      valor:    '',
      isLoading: false,
    };
  },
  watch: {
    'kmFinal': function (newQuestion, oldQuestion) {
      setTimeout(() => {
        this.validarKm()
      }, 700);
    },
    'kmInicio': function (newQuestion, oldQuestion) {
      setTimeout(() => {
        this.validarKm()
      }, 700);
    },
    'dtFinal': function (newQuestion, oldQuestion) {
      setTimeout(() => {
        this.validarDate()
      }, 700);
    },
    'dtInicio': function (newQuestion, oldQuestion) {
      setTimeout(() => {
        this.validarDate()
      }, 700);
    },
  },
  created: function() {
    this.dataT();
  },
  mounted: function() {
    //this.dataAjuste();
  },
  computed: {
    temMessage () {
      if(this.errorMessage.length > 0) return true
      if(this.successMessage.length > 0) return true
      return false
    },
    _os()  {
      return store.getters.getOsId(this.$route.params._os);
    },
    deslocTrajetos() {
      return store.state.deslocTrajetos;
    },
    deslocStatus: function () {
      //var filterKey = this.processo
      return data = store.state.deslocStatus;
    }
  },
  methods: {
    saveItem: function(){
      //this.errorMessage = []
      if(this.checkForm() && this.validarKm() && this.validarDate() ){
        this.isLoading = true
        if( this.trajeto.categoria == '1'){
          this.kmInicio  = '0';
          this.kmFinal   = '0';
        }else if( this.trajeto.categoria == '2' ){
          this.kmInicio  = '0';
          this.kmFinal   = '0';
          this.valor     = '0';
        }
        var postData = {
          osId:     this.$route.params._os,
          tecId:    this.data.tecnico,
          trajeto:  this.trajeto,
          status:   this.status,
          dtInicio: this.dtInicio,
          dtFinal:  this.dtFinal,
          kmInicio: this.kmInicio,
          kmFinal:  this.kmFinal,
          tempo:    this.tempo,
          hhValor:  this.hhValor,
          valor:    this.valor
        };
        //console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=modAdd', postData).then(function(response) {
          //console.log(response);
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
      if(!this.status) this.errorMessage.push("Status necessário.");
      if(!this.dtInicio) this.errorMessage.push("Data Inicial necessário.");
      if(!this.dtFinal) this.errorMessage.push("Data Final necessário.");
      if(!this.trajeto) this.errorMessage.push("Trajeto necessário.");
      if(this.trajeto.categoria == '0'){
        if( !this.kmInicio )this.errorMessage.push("Para o Trajeto escolhido o Km Inicial é necessário.");
        if( !this.kmFinal )this.errorMessage.push("Para o Trajeto escolhido o Km Final é necessário.");
      }else if ( this.trajeto.categoria == '1' ) {
        if( !this.valor )this.errorMessage.push("Para o Trajeto escolhido o Valor é necessário.");
      }
      this.validarKm();
      this.validarDate();
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    validarKm() {
      this.errorMessage = [];
      if( Number(this.kmFinal) < Number(this.kmInicio) ){
        this.errorMessage.push("Km Inicio não pode ser maior que Km Final!");
        return false;
      }else if( this.trajeto.categoria == '0' ){
        this.valor = (( Number(this.kmFinal) - Number(this.kmInicio) )* this.trajeto.valor).toFixed(2);
        return true;
      }else{
        return true;
      }
    },
    validarDate() {
      this.errorMessage = [];
      var data1 = new Date( this.dtInicio );
      var data2 = new Date( this.dtFinal );
      if( data1 >= data2 ){
        this.errorMessage.push("Data Inicial não pode ser maior ou igual que Data Final!");
        return false;
      }else{
        var timeDiff = Math.abs(data1.getTime() - data2.getTime());
        var diffDays = (timeDiff / 1000 / 60 / 60 ).toFixed(2);   
        var valorHh = ( diffDays * this.data.hh ).toFixed(2);
        this.tempo = diffDays;
        this.hhValor = valorHh;

        //console.log(valorHh);
        return true;
      }
    },
    dataT() {
      var datetime = new Date().toLocaleString();
      var res = datetime.split(" ");
      var date = res[0].split("/");
      var time = res[1].slice(0, -3);
      var dtTime = date[2] + "-" + date[1] + "-" + date[0] + "T" + time;
      this.dtInicio = dtTime;
      this.dtFinal = dtTime;
    },
    errorLimpar(){
      setTimeout(() => {
        this.errorMessage = [];
      }, 2000);
    }
  },
});