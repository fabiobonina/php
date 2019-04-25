<template id="demanda-list">
<div>
    <v-toolbar flat color="white">
      <v-toolbar-title>Expandable Table</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn color="primary" dark @click="expand = !expand">
        {{ expand ? 'Close' : 'Keep' }} other rows
      </v-btn>
      <!--amarar-cilindro :dialog-add="expand" v-on:close="close()"></amarar-cilindro-->
    </v-toolbar>

    <template>
  <v-layout row>
    <v-flex>
      <v-card>
        <v-toolbar color="teal" dark>
          <v-toolbar-side-icon></v-toolbar-side-icon>

          <v-toolbar-title>Topics</v-toolbar-title>

          <v-spacer></v-spacer>

          <v-btn icon>
            <v-icon>more_vert</v-icon>
          </v-btn>

        </v-toolbar>

        <v-list>
          <v-list-group
            v-for="item in data"
            :key="item.id"
            v-model="item.active"
            :prepend-icon="item.action"
            no-action
          >
            <template v-slot:activator>
              <v-list-tile>
                <v-list-tile-content>
                  <v-list-tile-title>{{ item.cil_tipo.name }}</v-list-tile-title>
                </v-list-tile-content>
              </v-list-tile>
            </template>

            <v-list-tile
              v-for="subItem in item.items"
              :key="subItem.id"
              @click=""
            >
              <v-list-tile-content>
                <v-list-tile-title>{{ subItem.cilindro.numero }} - {{ subItem.cilindro.fabricante }}</v-list-tile-title>
              </v-list-tile-content>

              <v-list-tile-action>
              {{ subItem.cilindro.cod_barras }}
                <v-icon @click="testingCode = subItem.cilindro.cod_barras; copyTestingCode()">mdi-content-copy</v-icon>
              </v-list-tile-action>
            </v-list-tile>
          </v-list-group>
        </v-list>
      </v-card>
    </v-flex>
  </v-layout>
</template>

    <v-data-table
      :headers="headers"
      :items="desserts"
      :expand="expand"
      item-key="name"
    >
      <template v-slot:items="props">
        <tr @click="props.expanded = !props.expanded">
          <td>{{ props.item.name }}</td>
          <td class="text-xs-right">{{ props.item.calories }}</td>
          <td class="text-xs-right">{{ props.item.fat }}</td>
          <td class="text-xs-right">{{ props.item.carbs }}</td>
          <td class="text-xs-right">{{ props.item.protein }}</td>
          <td class="text-xs-right">{{ props.item.iron }}</td>
        </tr>
      </template>
      <template v-slot:expand="props">
        <v-card flat>
          <v-card-text>Peek-a-boo!</v-card-text>
        </v-card>
      </template>
    </v-data-table>
    <textarea class="textarea" ref="copiar">{{ item }}</textarea>
    <input type="hidden" id="testing-code" :value="testingCode">
    <div class="container">
    <input type="text" v-model="message">
    <button type="button"
      v-clipboard:copy="message"
      v-clipboard:success="onCopy"
      v-clipboard:error="onError">Copy!</button>
  </div>
  </div>
</template>

<?php require_once 'src/components/controle_cilindros/programacao/demanda/_amararCilindro.php';?>
<script>
  Vue.component('demanda-list', {
    template: '#demanda-list',
    name: 'demanda-list',
    props: {
      data: {},
    },
    data: function () {
      return {
        expand: false,
        headers: [
          {
            text: 'Dessert (100g serving)',
            align: 'left',
            sortable: false,
            value: 'name'
          },
          { text: 'Calories', value: 'calories' },
          { text: 'Fat (g)', value: 'fat' },
          { text: 'Carbs (g)', value: 'carbs' },
          { text: 'Protein (g)', value: 'protein' },
          { text: 'Iron (%)', value: 'iron' }
        ],
        desserts: [
          {
            name: 'Frozen Yogurt',
            calories: 159,
            fat: 6.0,
            carbs: 24,
            protein: 4.0,
            iron: '1%'
          },
          {
            name: 'Ice cream sandwich',
            calories: 237,
            fat: 9.0,
            carbs: 37,
            protein: 4.3,
            iron: '1%'
          },
        ],
        itemsI: [
          {
            action: 'local_activity',
            title: 'Attractions',
            items: [
              { title: 'List Item' }
            ]
          },
          {
            action: 'restaurant',
            title: 'Dining',
            active: true,
            items: [
              { title: 'Breakfast & brunch' },
              { title: 'New American' },
              { title: 'Sushi' }
            ]
          },
        ],
        item: '',
        testingCode: 'ssas',
        message: 'Copy These Text',
      }
    },
    computed: {
      
    },
    filters: {
      
    },
    methods: {
      copy(item) {
        this.item = item
        var copyTextarea = this.$refs.copiar
        var copyTextarea = item
        console.log(copyTextarea);
        //copyTextarea.setAttribute('type', 'text')    // 不是 hidden 才能複製
        //item.select()
        copyTextarea.select()
        //copyTextarea.select();

        try {
          var successful = document.execCommand('copy');
          var msg = successful ? 'sim!' : 'não!';
          alert('Texto copiado? ' + msg);
        } catch (err) {
          alert('Opa, Não conseguimos copiar o texto, é possivel que o seu navegador não tenha suporte, tente usar Crtl+C.');
        }
        this.item = '';
      },
      copyTestingCode () {
          //this.testingCode = item
          
          let testingCodeToCopy = document.querySelector('#testing-code')
          
          console.log(testingCodeToCopy);
          testingCodeToCopy.setAttribute('type', 'text')    // 不是 hidden 才能複製
          testingCodeToCopy.select()

          try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            alert('Testing code was copied ' + msg);
          } catch (err) {
            alert('Oops, unable to copy');
          }

          /* unselect the range */
          testingCodeToCopy.setAttribute('type', 'hidden')
          window.getSelection().removeAllRanges()
        },
        onCopy: function (e) {
      alert('You just copied: ' + e.text)
    },
    onError: function (e) {
      alert('Failed to copy texts')
    }
    }
  })
</script>


