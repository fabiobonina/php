<template id="message">
    <div>
        <div  v-if="temErros" class="notification is-danger">
            <button class="delete"></button>
            <strong>Alert!</strong>
            <p v-for="message in error">{{ message }} </p>
        </div>
        <div v-if="temMessage" class="notification is-success">
            <button class="delete"></button>
            <strong>OK!</strong>
            <div v-for="message in success">
                <p > {{ message }} </p>
            </div>
            
        </div>
    </div>
</template>
