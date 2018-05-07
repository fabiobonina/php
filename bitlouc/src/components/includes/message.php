<template id="message">
    <div>
        <v-alert type="success" :value="temMessage">
            <p v-for="message in success">{{ message }} </p>
        </v-alert>

        <v-alert type="error" :value="temErros">
            <p v-for="message in error">{{ message }} </p>
        </v-alert>
    </div>
</template>
