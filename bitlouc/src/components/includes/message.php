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
<script src="src/components/includes/message.js"></script>