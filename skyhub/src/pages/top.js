Vue.component('top', {
  name: 'top',
  template: '#top',
  data: function () {
    return {
      errorMessage: '',
      successMessage: '',
      searchQuery: '',
      modalUser: false
    };
  },
  created: function() {
    this.$store.dispatch("fetchIndex").then(() => {
      console.log("Buscando dados para inicial!")
    });
    this.$store.dispatch("fetchOs").then(() => {
      console.log("Buscando dados OS!")
    });
  },
  computed: {
    user() {
      return store.state.user;
    },
  },
  watch: {
    // sempre que a pergunta mudar, essa função será executada
    searchQuery: function (val) {
      this.buscar();
    }
  },
  methods: {
    // Bu metot http get ile api üzerinden kayıtları users dizisine push eder
    buscar: function() {
      this.$store.dispatch('setSearch', this.searchQuery);
    }
  }
});

//Bulma
document.addEventListener('DOMContentLoaded', function () {

  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});