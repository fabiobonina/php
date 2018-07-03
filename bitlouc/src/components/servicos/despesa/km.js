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
      tipo: 'km',
      kmInicio:'', kmFinal:'', valor: '',
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
          trajeto:  this.tipo,
          kmInicio: this.data.kmInicio,
          kmFinal:  this.data.kmFinal,
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
    errorLimpar(){
      setTimeout(() => {
        this.errorMessage = [];
      }, 2000);
    }
  },
});