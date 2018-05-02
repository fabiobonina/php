<template id="login">
  <div>
    <v-card ustify-center>
      <v-card-title>
        Faça login para iniciar sua sessão
      </v-card-title>
      <v-card-text>
        
        <message :success="successMessage" :error="errorMessage"></message>
        <v-form v-model="valid" ref="form" lazy-validation>
          <v-text-field
            label="E-mail"
            v-model="email"
            :rules="emailRules"
            required
          ></v-text-field>
          <v-text-field
            name="input-10-1"
            label="Senha"
            hint="Pelo menos 6 caracteres"
            v-model="password"
            min="6"
            :append-icon="e1 ? 'visibility' : 'visibility_off'"
            :append-icon-cb="() => (e1 = !e1)"
            :type="e1 ? 'password' : 'text'"
            required
            counter
          ></v-text-field>
        </v-form>
      </v-card-text>
      <v-card-actions>
        Não tem uma conta? <a @click.stop="$emit('close')">Crie uma!</a>
        <v-spacer></v-spacer>
        <v-btn color="primary" @click.stop="logar()">Entrar</v-btn>
      </v-card-actions>
    </v-card>
  </div>
</template>