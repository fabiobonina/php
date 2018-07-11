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
      statusAtenInicio: [
        {id: 1, name: 'Trajeto', status: '1'},
        {id: 2, name: 'Serviço', status: '2'},
      ],
      statusServFinal: [
        {id: 1, name: 'Iniciar Retorno', status: '4'},
        {id: 2, name: 'Pausar Atendimento', status: '5'},
        {id: 3, name: 'Concluir Atendimento', status: '6'},
      ],
      statusAtenFinal: [
        {id: 2, name: 'Pausar Atendimento', status: '5'},
        {id: 3, name: 'Concluir Atendimento', status: '6'},
      ],
      dialogStatusAtenInicio: true,
      dialogStatusServFinal: false,
      dialogStatusAtenFinal: false,
      isLoading:  false,
      trajeto:    null,
      e1:         '0',

      dateInicio:     '',
      horaInicio:     '',
      dateFinal:      '',
      horaFinal:      '',
      dateServInicio: '',
      horaServInicio: '',
      dateServFinal:  '',
      horaServFinal:  '',
      
      tecnicos:     this.data.tecnicos,
      status:       null,
      dtInicio:     '',
      dtFinal:      '',
      dtServInicio: '',
      dtServFinal:  '',

      status: '',
      trajInicio: null,
      trajFinal:  null,
      
    };
  },
  watch: {
  },
  created: function() {
    this.dataT(detetime);
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
    atendimento(status) {
      if(status == '1'){
        this.dateInicio = this.dataT('dete');
        this.horaInicio = this.dataT('time');
        this.trajeto    = true;
        this.e1         = '1';
        this.inicio();
      }else if(status == '2') {
        this.dateServInicio = this.dataT('dete');
        this.horaServInicio = this.dataT('time');
        this.trajeto        = false;
        this.e1             = '2';
        this.inicio();
      }else if(status == '3') {
        this.dialogStatusServFinal  = true;
        this.servInicio();
      }else if(status == '4') {
        this.dialogStatusServFinal  = false;
        this.servInicio();
      }else if(status == '5') {
        this.trajeto  = false;
        this.servInicio();
      }else if(status == '6') {
        this.trajeto  = false;
        this.servInicio();
      }

    },
    trajetoI(){
      if(!this.trajeto){
        this.dtInicio = this.dtServInicio;
      };
    },
    servInicio() {
      this.dateServInicio = this.dateInicio;
      this.e1           = '2';
      this.inicio();
    },
    servFim() {
      this.dtServFinal = this.dtServInicio;
      this.e1           = '3';
      this.inicio();
    },
    statusAtendFim() {
      this.dtFinal = this.dtServFim;
      this.e1      = ''
    },
    inicio() {
      if(this.e1 > '0'){
        this.dialogStatusAtenInicio = false
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
      //if(!this.status) this.errorMessage.push("Status necessário.");
      if(!this.dtInicio) this.errorMessage.push("Data Inicial necessário.");
      if(!this.dtFinal) this.errorMessage.push("Data Final necessário.");
      if(!this.dtServInicio) this.errorMessage.push("Data Serviço necessário.");
      if(!this.dtServFinal) this.errorMessage.push("Data Serviço Final necessário.");
      if(!this.trajeto) this.errorMessage.push("Trajeto necessário.");
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
    dataT(variavel) {
      var datetime = new Date().toLocaleString();
      var res = datetime.split(" ");
      var date = res[0].split("/");
      var time = res[1].slice(0, -3);
      var dtTime = date[2] + "-" + date[1] + "-" + date[0] + "T" + time;
      if(variavel == 'date') return date;
      if(variavel == 'time') return time;
      return dtTime;
    },
    errorLimpar(){
      setTimeout(() => {
        this.errorMessage = [];
      }, 2000);
    }
  },
});