<template id="painel-cilindros">
  <div>
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
                                        <div class="spacer"></div>
                                        <i aria-hidden="true" class="v-icon mdi mdi-format-float-center theme--light" style="font-size: 28px;"></i>
                                    </v-card-title>
                                    <v-card-text>
                                        <span class="grey--text">Saida de Cilindros</span><br>
                                    </v-card-text>
                                </v-card>
                            </v-flex>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </template>
    <v-container fluid class="grid-list-xl pa-0">
        <v-layout row>
            <template v-for="(item, index) in painel">
                <v-flex>
                    <v-list >
                        <v-list-tile  :key="item.title" avatar  @click=""  :to="item.route">
                            <v-list-tile-avatar>
                            <v-icon :class="[item.iconClass]">{{ item.icon }}</v-icon>
                            </v-list-tile-avatar>

                            <v-list-tile-content>
                            <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                            <v-list-tile-sub-title>{{ item.subtitle }}</v-list-tile-sub-title>
                            </v-list-tile-content>

                            <v-list-tile-action>
                            <v-btn icon>
                                <v-icon>mdi-arrow-right </v-icon>
                            </v-btn>
                            </v-list-tile-action>
                        </v-list-tile>
                    </v-list>
                </v-flex>
            </template>
        </v-layout>
    </v-container>
    <div class="container fluid grid-list-xl pa-0">
    
    <div class="layout wrap">
        <div class="flex">
            <div role="list" class="v-list grey lighten-3 pa-0 v-list--two-line theme--light">
                <div role="listitem" class="v-list__tile--doc">
                    <a href="/pt-BR/components/buttons" class="v-list__tile v-list__tile--link theme--light">
                        <div class="v-list__tile__avatar">
                            <div class="v-avatar primary" style="height: 40px; width: 40px;">
                                <i aria-hidden="true" class="v-icon mdi mdi-view-dashboard theme--dark"></i>
                            </div>
                        </div>
                        <div class="v-list__tile__content">
                            <div class="v-list__tile__title">
                                <span>buttons</span>
                            </div>
                            <div class="v-list__tile__sub-title">
                                <span>components</span>
                            </div>
                        </div>
                        <div class="v-list__tile__action">
                            <i aria-hidden="true" class="v-icon mdi mdi-arrow-right theme--light"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex">
            <div role="list" class="v-list grey lighten-3 pa-0 v-list--two-line theme--light">
                <div role="listitem" class="v-list__tile--doc">
                    <a href="/pt-BR/components/buttons" class="v-list__tile v-list__tile--link theme--light">
                        <div class="v-list__tile__avatar">
                            <div class="v-avatar primary" style="height: 40px; width: 40px;">
                                <i aria-hidden="true" class="v-icon mdi mdi-view-dashboard theme--dark"></i>
                            </div>
                        </div>
                        <div class="v-list__tile__content">
                            <div class="v-list__tile__title">
                                <span>buttons</span>
                            </div>
                            <div class="v-list__tile__sub-title">
                                <span>components</span>
                            </div>
                        </div>
                        <div class="v-list__tile__action">
                            <i aria-hidden="true" class="v-icon mdi mdi-arrow-right theme--light"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex">
            <div role="list" class="v-list grey lighten-3 pa-0 v-list--two-line theme--light">
                <div role="listitem" class="v-list__tile--doc">
                    <a href="/pt-BR/components/images" class="v-list__tile v-list__tile--link theme--light">
                        <div class="v-list__tile__avatar">
                            <div class="v-avatar primary" style="height: 40px; width: 40px;">
                                <i aria-hidden="true" class="v-icon mdi mdi-view-dashboard theme--dark"></i>
                            </div>
                        </div>
                        <div class="v-list__tile__content">
                            <div class="v-list__tile__title">
                                <span>images</span>
                            </div>
                            <div class="v-list__tile__sub-title">
                            <span>components</span>
                            </div>
                        </div><!---->
                        <div class="v-list__tile__action">
                            <i aria-hidden="true" class="v-icon mdi mdi-arrow-right theme--light"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex">
            <div role="list" class="v-list grey lighten-3 pa-0 v-list--two-line theme--light">
                <div role="listitem" class="v-list__tile--doc">
                        <a href="/pt-BR/framework/typography" class="v-list__tile v-list__tile--link theme--light">
                        <div class="v-list__tile__avatar">
                        <div class="v-avatar brown" style="height: 40px; width: 40px;">
                        <i aria-hidden="true" class="v-icon mdi mdi-buffer theme--dark"></i>
                        </div></div><div class="v-list__tile__content">
                        <div class="v-list__tile__title">
                        <span>typography</span>
                        </div>
                        <div class="v-list__tile__sub-title">
                        <span>framework</span>
                        </div>
                        </div><!---->
                        <div class="v-list__tile__action">
                        <i aria-hidden="true" class="v-icon mdi mdi-arrow-right theme--light"></i>
                        </div>
                        </a>
                        </div>
                        </div>
                        </div>
                        </div>
        </div>
    </div>
  
</template>
<?php require_once 'src/components/controle_cilindros/cilindro/index.php';?>
<script>
    var PainelCilindros = Vue.extend({
    template: '#painel-cilindros',
    props: {
      data: Array
    },
    data: function () {
      return {
        errorMessage: '',
        successMessage: '',
        painel: [
            { title: 'Programação',
                subtitle: 'outra coisa',
                router: '/controle-cilindros/programacao',
                icon: 'mdi-home',
                iconClass: 'grey lighten-1 white--text'
            },
            { title: 'Cilindros',
                subtitle: 'outra coisa',
                router: '/controle-cilindros/cilindros',
                icon: 'mdi-buffer',
                iconClass: 'grey lighten-1 white--text',
            },
            { title: 'Cilindros',
                subtitle: 'outra coisa',
                router: '/controle-cilindros/cilindros',
                icon: 'mdi-buffer',
                iconClass: 'grey lighten-1 white--text',
            },
            { title: 'Cilindros',
                subtitle: 'outra coisa',
                router: '/controle-cilindros/cilindros',
                icon: 'mdi-buffer',
                iconClass: 'grey lighten-1 white--text',
            }
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

