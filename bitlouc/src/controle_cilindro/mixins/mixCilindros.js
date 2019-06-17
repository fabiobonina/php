var mixCilindro = {
  data: function () {
      return {
          errorMessage: [],
          successMessage: [],
          defaultItem: {
            loja:         {},
            local:        {},
            local_id:     '',
            serie:        '',
            fabricante:   '',
            capacidade:   {},
            dt_fabric:    '',
            dt_validade:  '',
            tara_inicial: '',
            tara_atual:   '',
            condenado:    '0',
            status:       '0',
            ativo:        '0',
            id:           '',
          },
      };
  },
  created: function() {
      //this.getProgramacoes();
  },
  computed: {
      /*programacoes() {
          return this.$store.getters.cilProgramacao;
      }*/
  }, // computed
  methods: {
    saveItem: function(){
      this.errorMessage = [];
      this.$validator.validateAll().then((result) => {
        if (result && this.checkForm()) {
          this.errorMessage = [];
          var postData = {
            loja:         this.defaultItem.loja,
            serie:        this.defaultItem.serie.toUpperCase(),
            local_id:     this.validarLocal( this.defaultItem.local ),
            fabricante:   this.defaultItem.fabricante,
            capacidade:   this.defaultItem.capacidade,
            dt_fabric:    this.validarData( this.defaultItem.dt_fabric ),
            dt_validade:  this.validarData( this.defaultItem.dt_validade ),
            tara_inicial: this.defaultItem.tara_inicial,
            tara_atual:   this.defaultItem.tara_atual,
            condenado:    this.defaultItem.condenado,
            status:       this.defaultItem.status,
            ativo:        this.defaultItem.ativo,
            id:           this.defaultItem.id
          };
          //this.publishItem(this.defaultItem);
          this.$store.dispatch('publishCilindro', postData ).then(() => {
            this.successMessage.push(response.data.message);
            this.atualizar();
          })
          .catch(function(error) {
            console.log(error);
          });
        }
      });
    },
    close () {
      this.dialog = false;
      this.$emit('close');
    },
    atualizar: function(){
      setTimeout(() => {
        this.dialog = false;
        this.$emit('atualizar');
      }, 2000);
    },
    validarData(item){
      if(item.length == 7 ) return item+'-01';
    },
    validarLocal(local){
      if(!local ){
        return this.defaultItem.local_id = '';
      }else{
        return this.defaultItem.local_id = local.id;
      } 
    },
    checkForm:function() {
      this.errorMessage = [];
      if( !this.defaultItem.loja )          this.errorMessage.push("Loja é necessário.");
      if( !this.defaultItem.fabricante )    this.errorMessage.push("Fabricante é necessário.");
      if( !this.defaultItem.capacidade )    this.errorMessage.push("Capacidade é necessário.");
      if( !this.defaultItem.serie )         this.errorMessage.push("N. Serie é necessário.");
      if( !this.defaultItem.dt_fabric )     this.errorMessage.push("Dt.Fabricação é necessário.");
      if( !this.defaultItem.tara_inicial )  this.errorMessage.push("Tara Inicial é necessário.");
      if(!this.errorMessage.length)   return true;
      //e.preventDefault();
    },
  },

}