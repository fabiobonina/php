<template id="painel-cilindros">
    <v-content>
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
        <v-container fluid class="grid-list-xl pa-0">
            <v-layout wrap>
                <template>
                    <v-flex v-for="(item, index) in painel">
                        <v-list class="v-list grey lighten-3 pa-0" two-line theme-light>
                            <v-list-tile  :key="item.title" avatar  @click=""  :to="item.router">
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
        <rodape></rodape>
    </v-content>
</template>
<?php //require_once 'src/controle_cilindro/components/cilindro/index.php';?>
<?php //require_once 'src/controle_cilindro/components/programacao/index.php';?>
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
            
            { title: 'Reçepcão',
                subtitle: 'outra coisa',
                router: '/controle-cilindros/recepicao',
                icon: 'mdi-buffer',
                iconClass: 'grey lighten-1 white--text',
            },
            { title: 'Enchimento',
                subtitle: 'outra coisa',
                router: '/controle-cilindros/enchimento',
                icon: 'mdi-format-float-center',
                iconClass: 'primary white--text'
            },
            { title: 'Programação',
                subtitle: 'outra coisa',
                router: '/controle-cilindros/programacao',
                icon: 'mdi-home',
                iconClass: 'primary white--text'
            },
            { title: 'Cilindros',
                subtitle: 'outra coisa',
                router: '/controle-cilindros/cilindros',
                icon: 'mdi-buffer',
                iconClass: 'grey lighten-1 white--text',
            },
        ],
      };
    },
    created: function() {
      
    },
    computed: {
      locais()  {
        return this.$store.getters.getLocalLoja(this.$route.params._loja);
      },
    },
    methods: {
      
    }
  });

</script>

