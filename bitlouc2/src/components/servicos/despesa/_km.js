Vue.component('km-desp', {
  name: 'km-desp',
  template: '#km-desp',
  props: {
    data: Object,
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
      dialog: false
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
  },
  created: function() {
    //this.dataAjuste();
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
      if(this.checkForm() && this.validarKm() ){
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
          kmInicio: this.kmInicio,
          kmFinal:  this.kmFinal,
          valor:    this.valor
        };
        console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=km', postData).then(function(response) {
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
      if( !this.data.kmInicio )this.errorMessage.push("Km Inicial é necessário.");
      
      //this.validarKm();
      //this.validarDate();
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