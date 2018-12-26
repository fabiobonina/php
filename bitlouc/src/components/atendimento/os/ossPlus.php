
<template id="oss-plus">
  <div>
    <os-grid :data="oss" :status="status"></os-grid>
  </div>
</template>
<script>
var OssPlus = Vue.extend({
  template: '#oss-plus',
  name: 'oss-plus',
  data: function () {
    return {
      modalLocalAdd: false,
      status: null
    };
  },
  created: function() {

  },
  mounted: function() {
    //this.modalLocalAdd = true;
  },
  computed: {
    oss() {
      return store.state.oss;
    },
  }, // computed
  methods: {

  },
});

</script>