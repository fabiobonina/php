<template id="login">
  <div>
    <v-card ustify-center>
      <v-card-title>
        Faça login para iniciar sua sessão
      </v-card-title>
      <v-card-text>
        
        <message :success="successMessage" :error="errorMessage" v-on:close="errorMessage = []; successMessage = []"></message>
        <v-form>
        <v-text-field
            v-model="email"
            label="E-mail"
            :error-messages="errors.collect('email')"
            v-validate="'required|email'"
            data-vv-name="email"
            required
          ></v-text-field>
          <v-text-field
            label="Senha"
            v-model="password"
            v-validate="'required|min:6'"
            data-vv-name="password"
            :error-messages="errors.collect('password')"
            :append-icon="e1 ? 'visibility' : 'visibility_off'"
            :append-icon-cb="() => (e1 = !e1)"
            type="password"
            required
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

<script src="src/components/includes/login.js"></script>