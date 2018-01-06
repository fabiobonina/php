
<template id="user">
  <div>
    <div class="modal is-active">
      <div class="modal-background"></div>
      <div class="modal-content">
        <div class="box">
          <article class="media">
            <div class="media-left">
              <figure class="image is-64x64 avatar">
                <img :src="user.avatar" alt="Image">
              </figure>
            </div>
            <div class="media-content">
              <div class="content">
                <p>
                  <strong>{{ user.user }}</strong> 
                  <br>
                  {{ user.name }}
                  <br>
                  <small> {{ user.email }} </small> <small>Mebro desde: {{ user.data }}</small>
                </p>
              </div>
              <nav class="level is-mobile">
                <div class="level-left">
                  <a href="?sair" onClick="return confirm('Deseja realmente sair do Sistema?')" class="level-item button is-danger">Sign out</a>
                </div>
              </nav>
            </div>
          </article>
        </div>
      </div>
      <button class="modal-close is-large" aria-label="close" v-on:click="$emit('close')"></button>
    </div>
  </div>
</template>