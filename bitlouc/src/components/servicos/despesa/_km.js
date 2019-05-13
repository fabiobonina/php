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
        //store.commit('isLoading')
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
            //store.commit('isLoading');
          } else{
            this.successMessage.push(response.data.message);
            //store.commit('isLoading');
            this.$store.dispatch('findOs', this.$route.params._os).then(() => {
      console.log("Buscando dados da os")
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