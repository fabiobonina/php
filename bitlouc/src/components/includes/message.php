<template id="message">
    <div>
        <v-snackbar v-model="temErros" color="error" top multi-line :timeout="timeout">
            <p v-for="message in error">{{ message }} </p>
            <v-btn dark flat @click="temErros = false">Close</v-btn>
        </v-snackbar>
        <v-snackbar v-model="temMessage" color="success" top multi-line :timeout="timeout">
            <p v-for="message in success">{{ message }} </p>
            <v-btn dark flat @click="snackbar = false">Close</v-btn>
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
</script>