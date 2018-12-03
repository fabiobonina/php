<template id="message">
    <div>
        <v-snackbar v-model="temErros" color="error" :timeout="timeout" top multi-line absolute>
            <p v-for="message in error"> {{ message }} </p>
            <v-btn dark flat @click="close()">Close</v-btn>
        </v-snackbar>
        <v-snackbar v-model="temMessage" color="success" :timeout="timeout" top multi-line absolute>
            <p v-for="message in success"> {{ message }} </p>
            <v-btn dark flat @click="close()">Close</v-btn>
        </v-snackbar>
    </div>
</template>
<script>
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
                timeout: 7000,
            };
        },
        /*watch: {
            'error': function (newQuestion, oldQuestion) {
                !this.snackbar
            },
            'success': function (newQuestion, oldQuestion) {
                !this.snackbar1
            },
        },*/
        computed: {
            temErros () {
                if(this.error.length > 0) return true
                return false
            },
            temMessage () {
                if(this.success.length > 0) return true
                return false
            },
        },
        methods: {
            close () {
                this.$emit('close');
            },
        },
    });
</script>