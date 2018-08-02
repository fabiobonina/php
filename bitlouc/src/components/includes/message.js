Vue.component('message', {
    name: 'message',
    template: '#message',
    props: {
      error: Array,
      success: Array,
      alerta: Boolean
    },
    data() {
      return {
        snackbar: false,
        snackbar1: false,
        timeout: 20000,
      };
    },
    watch: {
      'error': function (newQuestion, oldQuestion) {
        this.snackbar = true
      },
    },
    computed: {
      temErros () {
        if(this.error.length > 0) return this.snackbar = true
        return this.snackbar = false
      },
      temMessage () {
        if(this.success.length > 0) return this.snackbar1 = true
        return this.snackbar1 = false
      }
    },
    methods: {

    },
  });