Vue.component('message', {
    name: 'message',
    template: '#message',
    data() {
      return {
      };
    },
    props: {
        error: Array,
        success: Array,
    },
    computed: {
      temErros () {
        return this.error.length > 0
      },
      temMessage () {
        return this.success.length > 0
      }
    },
    methods: {

    },
  });