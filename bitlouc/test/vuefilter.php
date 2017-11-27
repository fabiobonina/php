<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Vue.js with PHP Api - 0x90kh4n</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet" type="text/css"></link>
    <link href="styles.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
  </head>
  <body>
    <div class="container" id="people">
        <div class="filter">
            <label><input type="radio" v-model="selectedCategory" value="All" /> All</label>
            <label><input type="radio" v-model="selectedCategory" value="Tech" /> Tech</label>
            <label><input type="radio" v-model="selectedCategory" value="Entertainment" /> Entertainment</label>
            <label><input type="radio" v-model="selectedCategory" value="Fictional" /> Fictional</label>
        </div>
        
        <ul class="people-list">
            <li v-for="person in filteredPeople">{{ person.name }}</li>
        </ul>
    </div>
    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.1/vue.min.js"></script>
  </body>
</html>

<script>
    var vm = new Vue({
        el:  "#people",
        data: {
            people: [
                { name: "Bill Gates", category: "Tech" },
                { name: "Steve Jobs", category: "Tech" },
                { name: "Jeff Bezos", category: "Tech" },
                { name: "George Clooney", category: "Entertainment" },
                { name: "Meryl Streep", category: "Entertainment" },
                { name: "Amy Poehler", category: "Entertainment" },
                { name: "Lady of Lórien", category: "Fictional" },
                { name: "BB8", category: "Fictional" },
                { name: "Michael Scott", category: "Fictional" }
            ],
            selectedCategory: "All"
        },
        computed: {
            filteredPeople: function() {
                var vm = this;
                var category = vm.selectedCategory;
                
                if(category === "All") {
                    return vm.people;
                } else {
                    return vm.people.filter(function(person) {
                        return person.category === category;
                    });
                }
            }
        }
    });    
</script>

