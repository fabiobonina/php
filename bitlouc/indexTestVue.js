/**
 * Vue.js with PHP Api
 * @author Fabio Bonina <fabio.bonina@gmail.com>
*/
//Todos os postdados são enviados como json
//True para enviar como dados do formulário
Vue.http.options.emulateJSON = true;
const modalComponent = Vue.component('modal-component', {
        name: 'modalComponent',
        template: '#modal-component',
        data() {
          return {
            activeInComponent: false,
            message: '<i>Modal Content!</i>',
          };
        },
        props: {
          title: { type: String, default: '' },
          message: { type: String, default: 'Confirm' }
        },
        methods: {
          beforeLeave: function() {
            this.$emit('unsupportedBrowser')
          }
        },
      });