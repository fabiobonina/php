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
            id:           this.defaultItem.id,
            proprietario_id:  this.loja.proprietario_id,
            loja_id:          this.loja.id,
            loja_nick:        this.loja.nick,
            local_id:         this.local.id,
            uf:               this.local.uf,
            equipamento_id:   this.equipamento_id,
            categoria_id:     this.categoria_id,
            servico_id:       this.servico_id,
            data:             this.dataOs,
            dtCadastro:       new Date().toJSON(),
            ativo:            '0',
            id:               ''
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
      if( !this.defaultItem.local )         this.errorMessage.push("Fabricante é necessário.");
      if( !this.defaultItem.equipamento && !this.defaultItem.capacidade )    this.errorMessage.push("Equip. ou Capacidade é necessário.");
      if( !this.defaultItem.servico )       this.errorMessage.push("Serviço é necessário.");
      if( !this.defaultItem.tecnicos )      this.errorMessage.push("Tecnico(s) é necessário.");
      if( !this.defaultItem.dataOs )        this.errorMessage.push("DataOS é necessário.");
      if(!this.errorMessage.length)   return true;
      //e.preventDefault();
    },
  },

}