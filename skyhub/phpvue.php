<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>vue2</title>
    <script src="vueJS/vue.min.js"></script>
    
  </head>
  <body>
    <div id="root">
    	<table border="1" cellpadding="0" cellspacing="0" >
        	<tr>
            	<th width="162">Teste (1)</th>
                <th width="144">Teste (2)</th>
                <th width="124">Teste (3)</th>
                <th width="120">Teste (4)</th>
            </tr>
            <tr v-for="user in users">
            	<th>{{user.filial}}</th>
                <th>sadasd</th>
                <th>asda</th>
                <th>asda</th>
            </tr>
        </table>
    </div>
    <script>
		new Vue({
		  el: '#root',
		  data:{
			  	users: [],
				newUser:{ username: "", email:""}
			 },
			 mounted: function(){
				console.log("mounted");
				this.getAllUsers();
			},
			
			methods:{
			
				getAllUsers: function(){
					
					axios.get("http://127.0.0.1/VUEJS/teste.php")
					.then(function(response){
						console.log(response);
						if(response.data.error){
							app.errorMessage = response.date.message;	
						}else{
							app.users = response.data.users
						}
					});	
				}	
			}
		})
new Vue({
  el: '#root',
  data: {
    users: [],
    newUser: {
      username: "",
      email: ""
    },
    errorMessage: ""
  },
  mounted: function() {
    console.log("mounted");
    this.getAllUsers();
  },

  methods: {

    getAllUsers: function() {

      var self = this; // Armazena a instância do Vue em self

      axios.get("http://127.0.0.1/VUEJS/teste.php")
        .then(function(response) {
          console.log(response);
          if (response.data.error) {
            self.errorMessage = response.date.message;
          } else {
            // Faz referência a data.users
            self.users = response.data.users;
          }
        });
    }
  }

})
    </script>
  </body>
</html>