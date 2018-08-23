Vue.component('mod-full', {
  name: 'mod-full',
  template: '#mod-full',
  props: {
    data: Object,
    dialog: Boolean
  },
  data() {
    return {
      errorMessage: [],
      successMessage: [],
      tecnicos: this.data.tecnicos,
      status: null,
      atendimentoStatus: [
        {id: 1, name: 'Pausar Atendimento', status: '4'},
        {id: 2, name: 'Iniciar Retorno', status: '5'},
        {id: 3, name: 'Concluir Atendimento', status: '6'},
      ],
      trajeto: null,
      trajInicio: null,
      trajFinal: null,
      dtInicio: '',
      dtServInicio: '',
      dtServFinal: '',
      dtFinal: '',
      kmInicio: '',
      kmFinal:  '',
      tempo:    '',
      hhValor:  '',
      valor:    '',
      isLoading: false,
      e1: '0',
      dialog2: false,
      dialogInicial: true
    };
  },
  watch: {
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
    deslocStatus: function() {
      //var filterKey = this.processo
      return data = store.state.deslocStatus;
    }
  },
  methods: {
    saveItem: function()  {
      this.errorMessage = []
      this.isLoading = true
      if(!this.trajeto){
        this.dtInicio = this.dtServInicio;
      };
        var postData = {
          osId:         this.data.id,
          tecnicos:     this.tecnicos,
          trajeto:      this.trajeto,
          status:       this.status,
          dtInicio:     this.dtInicio,
          dtServInicio: this.dtServInicio,
          dtServFinal:  this.dtServFinal,
          dtFinal:      this.dtFinal,
        };
        console.log(postData);
        /*this.$http.post('./config/api/apiDespesa.php?action=desloc', postData).then(function(response) {
          console.log(response);
          if(response.data.success){
            this.successMessage.push(response.data.message);
            this.isLoading = false;
            this.$store.dispatch("fetchOs").then(() => {
              console.log("Buscando dados OS!")
            });
            setTimeout(() => {
              this.$emit('close');
            }, 2000);
          } else{
            this.errorMessage.push(response.data.message);
            this.isLoading = false;
            console.log(response);
          }
        })
        .catch(function(error) {
          console.log(error);
        });*/
    },
    atendimento(starus) {
      if(starus == '1'){
        this.trajeto  = true;
        this.trajetoI();
      }else if(starus == '2') {
        this.trajeto  = false;
        this.servicoI()
      } else {
        
      }
    },
    trajetoI(){
      this.dtInicio = this.dataT();
      this.e1       = '1';
      this.inicio();
    },
    servicoI() {
      this.dtServInicio = this.dataT();
      this.e1           = '2';
      this.inicio();
    },
    inicio() {
      if(this.e1 > '0'){
        this.dialogInicial = false
      }
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
      return dtTime;
    },
    errorLimpar(){
      setTimeout(() => {
        this.errorMessage = [];
      }, 2000);
    }
  },
});