Vue.component('mod-edt', {
  name: 'mod-edt',
  template: '#mod-edt',
  props: {
    data: Object
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
      //var filterKey = this.data.processo
      return data = store.state.deslocStatus;
      /*return data = data.filter(function (row) {
        if( filterKey == '0') {
          return row.processo == '1';
        }
        if( filterKey == '1') {
          return Number(row.processo) < 4 && Number(row.processo) >0 || Number(row.processo) == 10;
        }
        if( filterKey == '2') {
          return Number(row.processo) < 2 ;
        }
        if( filterKey == '3') {
          return Number(row.categoria) == 1 ;
        }
        if( filterKey == '4') {
          return Number(row.processo) < 4 ;
        }
      });*/
    }
  },
  methods: {
    saveItem: function(){
      this.errorMessage = []
      if(this.checkForm() ){
        this.isLoading = true
        if(this.trajeto.categoria == '0'){
          this.valor = '0';
        }else{
          this.km = '0';
        }
        var postData = {
          modId: this.data.id,
          tecnico: this.tecnico,
          trajeto: this.trajeto,
          status: this.status,
          dtInicio: this.dte,
          km: this.km,
          valor: this.valor
        };
        //console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=modEdt', postData)
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
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    validarKm() {
      if(this.data.trajeto.categoria == '0'){
        if( Number(this.data.kmFinal) < Number(this.data.kmInicio) ){
         this.errorMessage.push("Km Inicio não pode ser maior que Km Final!");
         return false
        }else{
          this.data.valor = ( Number(this.data.kmFinal) - Number(this.data.kmInicio) )* this.data.trajeto.valor;
          this.errorLimpar();
        }
      }
    },
    validarDate() {
          var data1 = new Date( this.data.dtInicio );
          var data2 = new Date( this.data.dtFinal );
        if( data1 > data2 ){
         this.errorMessage.push("Data Inicio não pode ser maior que Data Final!");
         return false
        }else{
          var timeDiff = Math.abs(data1.getTime() - data2.getTime());
          var diffDays = (timeDiff /1000 / 60 / 60 ).toFixed(2);   
          this.data.tempo = diffDays;
          //console.log(diffDays);
          this.errorLimpar();
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