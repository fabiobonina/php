<template id="register">
  <div>
    <v-card ustify-center>
      <v-card-title>
        Registre-se
      </v-card-title>
      <v-card-text>
        
        <message :success="successMessage" :error="errorMessage"></message>
        <v-form>
          <v-text-field
            v-model="name"
            label="Nome completo"
            :counter="50"
            :error-messages="errors.collect('name')"
            v-validate="'required|max:50'"
            data-vv-name="name"
            required
          ></v-text-field>
          <v-text-field
            v-model="user"
            label="Usuario"
            :counter="20"
            :error-messages="errors.collect('user')"
            v-validate="'required|max:20'"
            data-vv-name="user"
            required
          ></v-text-field>
          <v-text-field
            v-model="email"
            label="E-mail"
            :error-messages="errors.collect('email')"
            v-validate="'required|email'"
            data-vv-name="email"
            required
          ></v-text-field>
          <v-text-field
            v-model="emailR"
            label="E-mail Confime"
            :error-messages="errors.collect('emailR')"
            v-validate="'required|email|confirmed:email'"
            data-vv-name="emailR"
            required
          ></v-text-field>
          <v-text-field
            name="input-10-1"
            label="Senha"
            v-model="password"
            v-validate="'required|min:6'"
            data-vv-name="password"
            :error-messages="errors.collect('password')"
            :append-icon="e1 ? 'visibility' : 'visibility_off'"
            :append-icon-cb="() => (e1 = !e1)"
            :type="e1 ? 'password' : 'text'"
            required
          ></v-text-field>
          <v-text-field
            name="input-10-1"
            label="Senha confime"
            v-model="passwordR"
            v-validate="'confirmed:password'"
            :error-messages="errors.collect('passwordR')"
            :append-icon="e1 ? 'visibility' : 'visibility_off'"
            :append-icon-cb="() => (e1 = !e1)"
            :type="e1 ? 'password' : 'text'"
            data-vv-name="passwordR"
            required
          ></v-text-field>
        </v-form>
      </v-card-text>
      <v-card-actions>
        Já tem uma conta? <a @click.stop="$emit('close')">Logar!</a>
        <v-spacer></v-spacer>
        <v-btn color="primary" @click.stop="registrar()">Criar</v-btn>
      </v-card-actions>
    </v-card>
  </div>
</template>