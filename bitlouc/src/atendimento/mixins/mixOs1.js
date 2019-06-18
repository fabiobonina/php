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
  }, // computed
  methods: {
    saveItem: function() {
      this.errorMessage = [];
      this.$validator.validateAll().then( function(result) {
        if (result && this.checkForm() ) {
          this.errorMessage = [];
          var postData = {
            loja:           this.defaultItem.loja,
            local:          this.defaultItem.local,
            equipamento_id: this.validarEquipamento( this.defaultItem.equipamento),
            categoria_id:   this.defaultItem.categoria.id,
            servico_id:     this.defaultItem.servico.id,
            data:           this.defaultItem.dataOs,
            id:             this.defaultItem.id
          };
          console.log( postData );
          this.$store.dispatch('publishOs', postData ).then( function(response) {
            this.successMessage.push(response.data.message);
            this.atualizar();
          })
          .catch(function(error) {
            console.log(error);
          });
        }
      });
    },
    close: function() {
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
        this.defaultItem.categoria = this.$store.getters.categoriasId(equipamento.categoria_id);
        return this.defaultItem.equipamento_id = equipamento.id;
      } else  {
        return this.defaultItem.equipamento_id = '';
      }
    },
    checkForm: function() {
      this.errorMessage = [];
      if( !this.defaultItem.loja )          this.errorMessage.push("Loja é necessário.");
      if( !this.defaultItem.local )         this.errorMessage.push("Fabricante é necessário.");
      if( !this.defaultItem.servico )       this.errorMessage.push("Serviço é necessário.");
      if( !this.defaultItem.tecnicos )      this.errorMessage.push("Tecnico(s) é necessário.");
      if( !this.defaultItem.dataOs )        this.errorMessage.push("DataOS é necessário.");
      if( !this.defaultItem.equipamento && !this.defaultItem.capacidade )   this.errorMessage.push("Equip. ou Capacidade é necessário.");
      if( !this.errorMessage.length)   return true;
      //e.preventDefault();
    },
  },

};