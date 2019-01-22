
<template id="oss-plus">
  <div>
    <oss-top></oss-top>
    <atend-grid :data="oss" :status="status"></atend-grid>
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
<?php require_once 'src/components/gerencial/oss-top.php';?>