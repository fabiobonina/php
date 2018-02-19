
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Basic Vue router</title> 
</head>

<body>
 <root-header 
   :is-admin="<?php echo isAdmin() ? 'true' : 'false' ?>">
 </root-header>

 <users-form 
    :user="'<?php echo json_encode($user) ?>'"
     base-url="<?php echo baseUrl() ?>">
 </users-table>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.7/vue.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue-router/2.0.2/vue-router.js'></script>

    <script src="vue/main.js"></script>

</body>
</html>
