<template id="is-login">
  <div>

    <v-layout row justify-center>
      
      <v-dialog
        v-model="dialog"
        fullscreen
        hide-overlay
        transition="dialog-bottom-transition"
        scrollable
      >
      
        <v-card tile color="blue">
          <v-toolbar card dark color="blue">
            <img src="img/bit-louc.png" height="36px" width="36px">
            <v-toolbar-title><b>Bit</b>LOUC </v-toolbar-title>
            <v-spacer></v-spacer>
          </v-toolbar>
          <v-card-text>
            <v-flex xs12 sm6 offset-sm3>
            <v-card ustify-center>
              <v-card-title>
                Faça login para iniciar sua sessão
              </v-card-title>
              <v-card-text>
                <v-form v-model="valid">
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
                    counter
                  ></v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
              Não tem uma conta? <a @click.stop="dialog2=true">Crie uma!</a>
                <v-spacer></v-spacer>
                <v-btn color="primary" @click.stop="dialog3=false">Entrar</v-btn>
              </v-card-actions>
            </v-card>

            <v-card ustify-center>
              <v-card-title>
                Registre-se
              </v-card-title>
              <v-card-text>
                <v-form v-model="valid">
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
                    label="E-mail"
                    v-model="emailR"
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
                    counter
                  ></v-text-field>
                  <v-text-field
                    name="input-10-1"
                    label="Senha"
                    hint="Pelo menos 6 caracteres"
                    v-model="passwordR"
                    min="6"
                    :append-icon="e1 ? 'visibility' : 'visibility_off'"
                    :append-icon-cb="() => (e1 = !e1)"
                    :type="e1 ? 'password' : 'text'"
                    counter
                  ></v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
                Já tem uma conta? <a @click.stop="dialog2=true">Logar!</a>
                <v-spacer></v-spacer>
                <v-btn color="primary" @click.stop="registrar()">Criar</v-btn>
              </v-card-actions>
            </v-card>
            <v-flex>            
          </v-card-text>

          <div style="flex: 1 1 auto;"></div>
        </v-card>
      </v-dialog>
        
    </v-layout>
  </div>




      </div>
</template>