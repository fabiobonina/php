<template id="painel-home">
    <div>
        <div class="v-content__wrap">
            <template>
                <div class="v-content__wrap">
                    <div class="container page" id="components-categories">
                        <section class="mb-5">
                            <div class="container pa-0 grid-list-xl fluid">
                                <div class="layout wrap">
                                    <v-flex v-for="item in painel" flex xs12 sm6 md4 d-flex>
                                        <v-card v-content__wrap :to="item.router" class="v-card--hover v-sheet theme--light">
                                            <v-card-title>
                                                <span class="headline">{{ item.title }}</span>
                                                <v-spacer></v-spacer>
                                                <v-icon light style="font-size: 28px;">{{ item.icon }}</v-icon>
                                            </v-card-title>
                                            <v-card-text>
                                                <span class="grey--text">{{ item.subtitle }}</span><br>
                                            </v-card-text>
                                        </v-card>
                                    </v-flex>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </template>
        </div>
    </div>
</template>

<?php require_once 'src/components/local/locais-grid.php';?>

<script>
  Vue.component('painel-home', {
    template: '#painel-home',
    props: {
      data: Array
    },
    data: function () {
      return {
        errorMessage: '',
        successMessage: '',
        painel: [            
            { title: 'Ordem de Serviço',
                subtitle: 'Controle dos atendimentos',
                router: '/oss',
                icon: 'mdi-format-float-center',
                iconClass: 'grey lighten-1 white--text',
            },
            { title: 'Controle Cilindros',
                subtitle: 'Programação de Cilindros',
                router: '/controle-cilindros',
                icon: 'mdi-format-float-center',
                iconClass: 'primary white--text'
            },
        ],
      };
    },
    created: function() {
      
    },
    computed: {
      locais()  {
        return store.getters.getLocalLoja(this.$route.params._loja);
      },
    },
    methods: {
      
    }
  });

</script>

