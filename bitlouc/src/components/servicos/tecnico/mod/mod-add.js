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
      tecnicos:     this.data.tecnicos,
      status: null,
      trajetoInicial: true,
      trajetoFinal: true,
      dtInicio: '',
      dtFinal:  '',
      kmInicio: '',
      kmFinal:  '',
      tempo:    '',
      isLoading:  false,
      dateInicio: this.data.data,
      horaInicio: '',
      dateFinal:  this.data.data,
      horaFinal:  '',
      progresso: '1',
    };
  },
  watch: {
    'progresso': function (newQuestion, oldQuestion) {
        this.checkDate()
    },
    'dateInicio': function (newQuestion, oldQuestion) {
      setTimeout(() => {
        this.checkDate()
      }, 700);
    },
    'dateFinal': function (newQuestion, oldQuestion) {
      setTimeout(() => {
        this.checkDate()
      }, 700);
    },
    'horaInicio': function (newQuestion, oldQuestion) {
      setTimeout(() => {
        this.checkDate()
      }, 700);
    },
    'horaFinal': function (newQuestion, oldQuestion) {
      setTimeout(() => {
        this.checkDate()
      }, 700);
    },
  },
  created: function() {
    //this.dataT();
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
      if(this.checkDate() && this.validarDate() ){
        this.isLoading = true
        //var obj   = this.tecnicos;
        //var user  = store.state.user;
        //var usert = "7";
        //var value = [];
        var data1 = new Date( this.dateInicio + "T" + this.horaInicio );
        var data2 = new Date( this.dateFinal + "T" + this.horaFinal  );
        var timeDiff = Math.abs(data1.getTime() - data2.getTime());
        var diffDays = (timeDiff / 1000 / 60 / 60 ).toFixed(2);
        for (var tec of this.tecnicos) {
          var valorHh = ( diffDays * tec.hh ).toFixed(2);
          tec.hhValor.push( valorHh);
          console.log(tec);
        }
          
        var postData = {
          osId:         this.$route.params._os,
          tecnicos:     this.tecnicos,
          trajeto:      this.trajeto,
          status:       this.status,
          dtInicio:     '',
          dtFinal:      '',
          dtServInicio: '',
          dtServFinal:  '',
          tempo:        this.tempo,
        };
        console.log(postData); /*
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
        });    */
      }
    },
    checkDate:function() {
      this.errorMessage = [];
      if(Number(this.progresso) > 1){
        if( !this.dateInicio | !this.horaInicio ) {
          this.errorMessage.push("Atendimento inicial: data e hora necessário.");
        }
        else if ( Number(this.progresso) == 2 ) {
          if( !this.dateFinal | !this.horaFinal ){
            this.errorMessage.push("Atendimento final: data e hora necessário.");
          }
        }else{
          this.validarDate();
        }
      }
      if(!this.errorMessage.length) return true;
      //e.preventDefault();
    },
    checkForm:function(e) {
      this.errorMessage = [];
      if(!this.status) this.errorMessage.push("Status necessário.");
      if(!this.dtInicio) this.errorMessage.push("Data Inicial necessário.");
      if(!this.dtFinal) this.errorMessage.push("Data Final necessário.");
      if(!this.trajeto) this.errorMessage.push("Trajeto necessário.");
      this.validarDate();
      if(!this.errorMessage.length) return true;
      e.preventDefault();
    },
    validarDate() {
      this.errorMessage = [];
      var data1 = new Date( this.dateInicio + "T" + this.horaInicio );
      var data2 = new Date( this.dateFinal + "T" + this.horaFinal  );
      if( data1 >= data2 ){
        this.errorMessage.push("Data Inicial não pode ser maior ou igual que Data Final!");
        return false;
      }else{
        var timeDiff = Math.abs(data1.getTime() - data2.getTime());
        var diffDays = (timeDiff / 1000 / 60 / 60 ).toFixed(2);
        //var valorHh = ( diffDays * this.data.hh ).toFixed(2);
        this.tempo = diffDays;
        //this.hhValor = valorHh;

        console.log(this.tempo);
        return true;
      }
    },
    valideDtMenor(dateI, dateII) {
      this.errorMessage = [];
      var data1 = new Date( dateI );
      var data2 = new Date( dateII );
      if( data2 < data1 ){
        return false;
      }else{
        return true;
      }
    },
    valideDtMaior(dateI, dateII) {
      this.errorMessage = [];
      var data1 = new Date( dateI );
      var data2 = new Date( dateII );
      if( data2 > data1 ){
        return false;
      }else{
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