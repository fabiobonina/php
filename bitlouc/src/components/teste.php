<template id="modal-component">
  <transition name="modal" v-on:before-leave="beforeLeave">
    <div class="vue-modal-mask">
      <div class="vue-modal-wrapper">
        <div class="vue-modal-container">

          <div class="vue-modal-header">
            <slot name="header">
              {{title}}
            </slot>
          </div>

          <div class="vue-modal-body">
            <slot name="body">
              {{message}}
            </slot>
          </div>

          <div class="vue-modal-footer">
            <slot name="footer">
              <button class="btn btn-default vue-modal-default-button" v-on:click="$emit('close')">OK</button>
              <button class="btn btn-danger" v-on:click="$emit('close')">Cancel</button>
            </slot>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>
    