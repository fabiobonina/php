<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Vue.js with PHP Api - 0x90kh4n</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet" type="text/css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.css' rel="stylesheet" type="text/css"></link>
    <link href="styles.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
  </head>
  <body>
    <div id="root">
    <tabs>
        <tab name='About us' :selected='true'>
            <h1>here is the content for about us. </h1>
        </tab>
        
        <tab name='About our mood'>
            <h1>here is the content for about our mood. </h1>
        </tab>
        
        <tab name='About our culture'>
            <h1>here is the content for about our culture. </h1>
        </tab>
    </tabs>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.4/vue.min.js"></script>
  </body>
</html>

<script>
    
    Vue.component('tabs',{
        template:`
        <div>
          <div class="tabs">
            <ul>
              <li v-for='tab in tabs' :class="{'is-active': tab.isActive}">
                <a :href='tab.href' @click='selectedTab(tab)'>{{tab.name}}</a>
              </li>
            </ul>
          </div>
          <div class='tab-detail'>
            <slot></slot>
          </div>
        </div>
      `,
        mounted(){
          console.log(this.$children)
        },
        data(){
          return {tabs:[]};
        },
        created(){
          this.tabs = this.$children
        },
        methods:{
          selectedTab(selectedTab){
            this.tabs.forEach( tab =>{ 
              tab.isActive = (tab.name == selectedTab.name) }      
             )
          }
        }
      })
      
      Vue.component('tab',{
        template:`
          <div v-show='isActive'><slot></slot></div>
        `,
        props:{
          name:{required:true},
          selected:{default:false}
        },
        data(){
          return{    isActive:false
            }
        },
        computed:{
           href(){
             return '#'+this.name.toLowerCase().replace(/ /g,'-');
           }
        },
        mounted(){
          this.isActive = this.selected
        }
      })
      
      new Vue({
        el:'#root'
      })
</script>

