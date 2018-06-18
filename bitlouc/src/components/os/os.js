var Os = Vue.extend({
  template: '#os',
  data: function () {
    return {
      errorMessage: [],
      successMessage: [],
      search: '',
      modalItem: null,
      gridColumns: ['nick', 'name'],
      isLoading: false,
      modalDeslocAdd: false,
      modalDeslocChg: false,
      modalDeslocEdt: false,
      modalModAdd:    false,
      modalModEdt:    false,
      modalNotaAdd:   false,
      modalNotaEdt:   false,
      selectedCategoria: 'All',
      labels: ['','Em trasito', 'Atendendo', 'Retorno Viagem', 'Completo' ],
      labels2: ['Atendimento', 'Concluido', 'Fechado', 'Validado' ],
      active: '1',
      configs: {
        orderBy: { name: 'Nome', state: 'name' },
        order: 'asc',
        search: ''
      },
      itens: [
        { name: 'Nome', state: 'name' },
        { name: 'Regional', state: 'regional' }
      ],    
    };
  },
  created: function() {
    this.$store.dispatch('fetchLocais', this.$route.params._id).then(() => {
      console.log("Buscando dados das locais!")
    });
    
  },
  mounted: function() {
    //this.modalDeslocAdd = true;
  },
  computed: {
    loja()  {
      return store.getters.getOsId(this.$route.params._id);
    },
    _os()  {
      return store.getters.getOsId(this.$route.params._os);
    },
    user()  {
      return store.state.user;
    },
  }, // computed
  methods: {
    osConcluir: function() {
      if(confirm('Deseja realmente Concluir a OS?')){
        this.isLoading = true
        var postData = {
          os: this._os.id,
          processo: '4',
          status: Number(this._os.status) + 1
        };
        //console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=osConcluir', postData).then(function(response) {
          //console.log(response);
          if(response.data.error){
            this.errorMessage = response.data.message;
            this.isLoading = false;
          } else{
            this.successMessage.push(response.data.message);
            this.isLoading = false;
            this.onAtualizar();
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
    osReabrir: function() {
      if(confirm('Deseja realmente Reabrir a OS?')){
        this.isLoading = true
        var postData = {
          os: this._os.id,
          status: '1'
        };
        //console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=osReabrir', postData).then(function(response) {
          //console.log(response);
          if(response.data.error){
            this.errorMessage = response.data.message;
            this.isLoading = false;
          } else{
            this.successMessage.push(response.data.message);
            this.isLoading = false;
            this.onAtualizar();
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
    osFechar: function() {
      if(confirm('Deseja realmente Fechar a OS?')){
        this.isLoading = true
        var postData = {
          os: this._os.id,
          processo: '4',
          status: '3'
        };
        //console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=osFechar', postData).then(function(response) {
          //console.log(response);
          if(response.data.error){
            this.errorMessage = response.data.message;
            this.isLoading = false;
          } else{
            this.successMessage.push(response.data.message);
            this.isLoading = false;
            this.onAtualizar();
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
    osValidar: function() {
      if(confirm('Deseja realmente Encerrar a OS?')){
        this.isLoading = true
        var postData = {
          os: this._os.id,
          status: '4'
        };
        //console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=osValidar', postData).then(function(response) {
          console.log(response);
          if(response.data.error){
            this.errorMessage = response.data.message;
            this.isLoading = false;
          } else{
            this.successMessage.push(response.data.message);
            this.isLoading = false;
            this.onAtualizar();
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
    modDel: function(data) {
      if(confirm('Deseja realmente deletar ' + data.status.tipo + '?')){
        this.isLoading = true
        var postData = {
          id: data.id
        };
        //console.log(postData);
        this.$http.post('./config/api/apiOs.php?action=modDel', postData).then(function(response) {
          //console.log(response);
          if(response.data.error){
            this.errorMessage = response.data.message;
            this.isLoading = false;
          } else{
            this.successMessage.push(response.data.message);
            this.isLoading = false;
            this.onAtualizar();
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
    onAtualizar: function(){
      this.$store.dispatch("fetchOs").then(() => {
        console.log("Atualizando dados OS!")
      });
    },
    selecItem: function(data){
      this.modalItem = data;
    },
  },
});