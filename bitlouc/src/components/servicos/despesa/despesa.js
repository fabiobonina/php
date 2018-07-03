Vue.component('desp-km', {
  name: 'desp-km',
  template: '#desp-km',
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
      dtFinal:'',
      dtInicio: '', kmInicio:'', kmFinal:'',  dtDesloc: '', valor: '', tempo: '',
      isLoading: false,
    };
  },
  watch: {
    'data.kmFinal': function (newQuestion, oldQuestion) {
      setTimeout(() => {
        this.validarKm()
      }, 700);
    },
    'data.kmInicio': function (newQuestion, oldQuestion) {
      setTimeout(() => {
        this.validarKm()
      }, 700);
    },
    'data.dtFinal': function (newQuestion, oldQuestion) {
      setTimeout(() => {
        this.validarDate()
      }, 700);
    },
    'data.dtInicio': function (newQuestion, oldQuestion) {
      setTimeout(() => {
        this.validarDate()
      }, 700);
    },
  },
  created: function() {
    this.dataAjuste();
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
    deslocTrajetos() {
      return store.state.deslocTrajetos;
    },
    deslocStatus: function () {
      return data = store.state.deslocStatus;
    }
  },
  methods: {
    saveItem: function(){
      //this.errorMessage = []
      if(this.checkForm() && this.validarKm() && this.validarDate() ){
        this.isLoading = true
        if( this.data.trajeto.categoria == '1'){
          this.data.kmInicio  = '0';
          this.data.kmFinal   = '0';
        }else if( this.data.trajeto.categoria == '2' ){
          this.data.kmInicio  = '0';
          this.data.kmFinal   = '0';
          this.data.valor     = '0';
        }
        var postData = {
          osId:     this.data.os,
          modId:    this.data.id,
          tecId:    this.data.tecnico.id,
          trajeto:  this.data.trajeto,
          status:   this.data.status,
          dtInicio: this.data.dtInicio,
          dtFinal:  this.data.dtFinal,
          kmInicio: this.data.kmInicio,
          kmFinal:  this.data.kmFinal,
          tempo:    this.data.tempo,
          hhValor:  this.data.hhValor,
          valor:    this.data.valor
        };
        console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=modEdt', postData).then(function(response) {
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
      if(!this.data.status) this.errorMessage.push("Status necessário.");
      if(!this.data.dtInicio) this.errorMessage.push("Data Inicial necessário.");
      if(!this.data.dtFinal) this.errorMessage.push("Data Final necessário.");
      if(!this.data.trajeto) this.errorMessage.push("Trajeto necessário.");
      if(this.data.trajeto.categoria == '0'){
        if( !this.data.kmInicio )this.errorMessage.push("Para o Trajeto escolhido o Km Inicial é necessário.");
        if( !this.data.kmFinal )this.errorMessage.push("Para o Trajeto escolhido o Km Final é necessário.");
      }else if ( this.data.trajeto.categoria == '1' ) {
        if( !this.data.valor )this.errorMessage.push("Para o Trajeto escolhido o Valor é necessário.");
      }
      this.validarKm();
      this.validarDate();
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    validarKm() {
      this.errorMessage = [];
      if( Number(this.data.kmFinal) < Number(this.data.kmInicio) ){
        this.errorMessage.push("Km Inicio não pode ser maior que Km Final!");
        return false;
      }else if( this.data.trajeto.categoria == '0' ){
        this.data.valor = (( Number(this.data.kmFinal) - Number(this.data.kmInicio) )* this.data.trajeto.valor).toFixed(2);
        return true;
      }else{
        return true;
      }
    },
    validarDate() {
      this.errorMessage = [];
      var data1 = new Date( this.data.dtInicio );
      var data2 = new Date( this.data.dtFinal );
      if( data1 > data2 ){
        this.errorMessage.push("Data Inicial não pode ser maior que Data Final!");
        return false;
      }else{
        var timeDiff = Math.abs(data1.getTime() - data2.getTime());
        var diffDays = (timeDiff / 1000 / 60 / 60 ).toFixed(2);   
        var valorHh = ( diffDays * this.data.tecnico.hh ).toFixed(2);
        this.data.tempo = diffDays;
        this.data.hhValor = valorHh;

        //console.log(valorHh);
        return true;
      }
    },
    dataT(data) {
      var res = data.split(" ");
      //console.log(res);
      var date = res[0];
      var time = res[1].slice(0, -3);
      var dtTime = date + "T" + time;
      return dtTime;
    },
    dataAjuste: function(){
      //console.log('data');
      this.data.dtInicio = this.dataT(this.data.dtInicio );
      this.data.dtFinal = this.dataT(this.data.dtFinal);
    },
    errorLimpar(){
      setTimeout(() => {
        this.errorMessage = [];
      }, 2000);
    }
  },
});