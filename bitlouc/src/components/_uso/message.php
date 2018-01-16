<template id="message">
    <div>
        <article v-if="temErros" class="message is-danger">
            <div class="message-header">
            <p>Alert!</p>
            <button class="delete" aria-label="delete"></button>
            </div>
            <div class="message-body">
            <p v-for="message in error">{{ message }}</p>
            </div>
        </article>
        <article v-if="temMessage" class="message is-success">
            <div class="message-header">
                <p>OK!</p>
                <button class="delete" aria-label="delete"></button>
            </div>
            <div class="message-body">
                <p v-for="message in success">{{ message }}</p>
            </div>
        </article>
    </div>
</template>
