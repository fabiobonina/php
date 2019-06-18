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
            dataOs:       '',
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
            data:             this.defaultItem.dataOs,
            id:               this.defaultItem.id
          };
          //this.publishItem(this.defaultItem);
          this.$store.dispatch('publishOs', postData ).then( function(response) {
            this.successMessage.push(response.data.message);
            this.atualizar();
          })
          .catch(function(error) {
            console.log(error);
          });
          /*this.$http.post('./config/api/cilindro.api.php?action=publish', postData).then(function(response) {
            console.log(response);
            if(!response.data.error){
                this.successMessage.push(response.data.message);
                store.commit('isLoading');
                setTimeout(() => {
                  this.$router.push('/programacao/'+response.data.id)
                  this.$emit('close');
                }, 2000);
              } else{
                this.errorMessage.push(response.data.message);
                store.commit('isLoading');
              }
          })
          .catch(function(error) {
            store.commit('isLoading');
            console.log(error);
          });*/
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
    validarEquipamento (equipamento){
      if( equipamento ) {
        this.defaultItem.categoria = this.$store.getters.categoriaId(equipamento.categoria_id);
        return this.defaultItem.equipamento_id = equipamento.id;
      } else  {
        return this.defaultItem.equipamento_id = '';
      }
    },
    checkForm:function() {
      this.errorMessage = [];
      if( !this.defaultItem.loja.id )          this.errorMessage.push("Loja é necessário.");
      if( !this.defaultItem.local.id )         this.errorMessage.push("Fabricante é necessário.");
      if( !this.defaultItem.equipamento && !this.defaultItem.capacidade )    this.errorMessage.push("Equip. ou Capacidade é necessário.");
      if( !this.defaultItem.servico.id )       this.errorMessage.push("Serviço é necessário.");
      if( !this.defaultItem.tecnicos )      this.errorMessage.push("Tecnico(s) é necessário.");
      if( !this.defaultItem.dataOs )        this.errorMessage.push("DataOS é necessário.");
      if(!this.errorMessage.length)   return true;
      //e.preventDefault();
    },
  },

}