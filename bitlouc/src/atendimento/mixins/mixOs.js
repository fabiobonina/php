var mixOs = {
  data: function () {
      return {
          errorMessage: [],
          successMessage: [],
          defaultItem: {
            loja:         {},
            local:        {},
            equipamento:  null,
            categoria:    {},
            servico:      {},
            tecnicos:     [],
            data:         '',
            id:           '',
          },
      };
  },
  created: function() {
      //this.getProgramacoes();
  },
  computed: {
      /*programacoes() {
          return this.$store.state.cilProgramacao;
      }*/
  }, // computed
  methods: {
    saveItem: function(){
      this.errorMessage = [];
      this.$validator.validateAll().then((result) => {
        if (result && this.checkForm()) {
          this.errorMessage = [];
          var postData = {
            loja:             this.defaultItem.loja,
            local:            this.defaultItem.local,
            equipamento_id:   this.validarEquipamento (this.defaultItem.equipamento),
            categoria_id:     this.defaultItem.categoria.id,
            servico_id:       this.defaultItem.servico.id,
            data:             this.defaultItem.data,
            tecnicos:         this.validarTecnico(),
            id:               this.defaultItem.id
          };
          //this.publishItem(this.defaultItem);
          this.$store.dispatch('publishOs', postData ).then( function(response) {
            console.log(response);
            
            if(!response.error){
              this.atualizar();
            }
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
    atualizar (){
      setTimeout(() => {
        this.dialog = false;
        this.$emit('atualizar');
      }, 2000);
    },
    validarEquipamento (equipamento){
      if( equipamento ) {
        this.defaultItem.categoria = this.$store.getters.categoriaId(equipamento.categoria_id);
        return this.defaultItem.equipamento_id = equipamento.id;
      } else  {
        return this.defaultItem.equipamento_id = '';
      }
    },
    validarTecnico (){
      var tecnico = null;
      if( this.defaultItem.id ) {
        return tecnico;
      } else  {
        return this.defaultItem.tecnicos;
      }
    },
    checkForm:function() {
      this.errorMessage = [];
      if( !this.defaultItem.loja.id )      this.$store.dispatch('errorMessage', 'Loja é necessário.');
      if( !this.defaultItem.local.id )     this.$store.dispatch('errorMessage', 'Fabricante é necessário.');
      if( !this.defaultItem.equipamento && !this.defaultItem.categoria )    this.$store.dispatch('errorMessage', 'Equip. ou Categoria é necessário.');
      if( !this.defaultItem.servico.id )   this.$store.dispatch('errorMessage', 'Serviço é necessário.');
      if( !this.defaultItem.tecnicos )     this.$store.dispatch('errorMessage', 'Tecnico(s) é necessário.');
      if( !this.defaultItem.data )       this.$store.dispatch('errorMessage', 'DataOS é necessário.');
      if(!this.$store.getters.errorMessage.length)   return true;
      //e.preventDefault();
    },
  },

}