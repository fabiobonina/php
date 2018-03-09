
<template id="os">
  <div>
    <nav class="breadcrumb is-right" aria-label="breadcrumbs">
      <ul>
        <li><router-link to="/"> Home</router-link></li>
        <li class="is-active"><a aria-current="page">Loja</a></li>
      </ul>
    </nav>
    <section class="section">
      <div class="container">
      <div>
          <div class="card" >
            <header class="card-header">
              <p class="card-header-title">
                <router-link :to="'/oss/' + $route.params._id + '/os/' + oss.id" class="product-title"> {{oss.lojaNick}} | {{oss.local.tipo}} - {{oss.local.name}} ({{oss.local.municipio}}/{{oss.local.uf}})</router-link>
              </p>
              <a class="card-header-icon" aria-label="more options">
                <span class="icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
              </a>
            </header>
            <div class="card-content">
              <div class="content">
                <article class="post" >
                  <div class="columns">
                    <div class="column is-6 is-info">
                      <a class="product-title"><h5> {{oss.data}} | {{oss.servico.name}}  </h5></a>
                        <div class="media">
                          <div class="media-content">
                            <div class="content">
                            <p v-if="oss.bem">{{oss.bem.name}} {{oss.bem.modelo}}  &nbsp; <a>#{{oss.bem.fabricanteNick}} </a> 
                                <span class="tag"></span> 
                            </p>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                        <div class="column is-6">
                          <nav class="level">
                            <div class="level-item has-text-centered">
                              <div>
                                <p class="heading">OS <span class="icon is-small"><i class="fa fa-wrench"></i></span></p>
                                <p class="title">  {{oss.filial}}| {{oss.os}} </p>
                              </div>
                            </div>
                            <div class="level-item has-text-centered">
                              <div>
                                <p class="heading">Ativo <i class="fa fa-barcode"></i></p>
                                <p v-if="oss.bem" class="title">{{ oss.bem.plaqueta }}</p>
                              </div>
                            </div>
                            <div class="level-item has-text-centered">
                              <div>
                                <a v-if=" 0.000000 != oss.local.latitude" :href="'https://maps.google.com/maps?q='+ oss.local.latitude + '%2C' + oss.local.longitude" target="_blank">
                                    <span>Mapa <i class="fa fa-map"></i></span>
                                </a>
                                <p class="field">
                                  <a v-on:click="showModal = true; selecItem(entry)" class="button is-small is-info">
                                    <span>Geoposição</span>
                                    <span class="icon is-small"><i class="fa fa-map-marker"></i></span>
                                  </a>
                                </p>
                              </div>
                            </div>
                            </nav>
                        </div>
                        </div>
                    </article>
                    <ul class="steps">
  <li class="step-item is-completed is-success">
    <div class="step-marker">
      <span class="icon">
        <i class="fa fa-check"></i>
      </span>
    </div>
    <div class="step-details is-primary is-completed">
      <p class="step-title">Step 1</p>
      <p>This is the first step of the process.</p>
    </div>
  </li>
  <li class="step-item is-info is-completed">
    <div class="step-marker"></div>
    <div class="step-details">
      <p class="step-title">Step 2</p>
      <p>This is the second step. You get here once you have completed the first step.</p>
    </div>
  </li>
  <li class="step-item is-warning is-completed">
    <div class="step-marker">3</div>
    <div class="step-details">
      <p class="step-title">Step 3</p>
      <p>This is the third step. One more last before the end.</p>
    </div>
  </li>
  <li class="step-item is-danger is-active">
    <div class="step-marker">
      <span class="icon">
        <i class="fa fa-flag"></i>
      </span>
    </div>
    <div class="step-details">
      <p class="step-title">Step 4</p>
      <p>Final step. You have completed all the previous steps and end the process.</p>
    </div>
  </li>
</ul>
                      <div class="checkout-wrap">
                      <p v-for="tecnico in oss.tecnicos"> <a>@{{tecnico.user}} &nbsp;</a> </p>
                        <ul v-if="!modalDeslocAdd" class="checkout-bar">
                          <li :class="oss.processo>1 ? 'visited first' : oss.processo==1 ? 'active' : ''"><a href="#">Em Transito</a></li>
                          <li :class="oss.processo>2 ? 'visited first' : oss.processo==2 ? 'active' : ''">Atendendo</li>
                          <li :class="oss.processo>3 ? 'visited first' : oss.processo==3 ? 'active' : ''">Teste</li>
                          <li :class="oss.processo>4 ? 'visited first' : oss.processo==4 ? 'active' : ''">Retorno</li>
                          <li :class="oss.processo>5 ? 'visited first' : oss.processo==5 ? 'previous visited' : ''">Completo</li>
                        </ul>
                      </div>
                    <br>
                </div>
            </div>
            <footer class="card-footer">
              <a href="#" class="card-footer-item">Save</a>
              <a href="#" class="card-footer-item">Edit</a>
              <a href="#" class="card-footer-item">Delete</a>
            </footer>
          </div>
          <br>
        </div>
      </div>
    </section>
    <section class="container">
      <div>
        <div class="tabs is-toggle">
          <ul>
            <li :class="active==1 ? 'is-active' : ''" @click="active=1">
              <a>
                <span class="icon is-small"><i class="fa fa-building-o"></i></span>
                <span>Locais</span>
              </a>
            </li>
            <li :class="active==2 ? 'is-active' : ''" @click="active=2">
              <a>
                <span class="icon is-small"><i class="fa fa-music"></i></span>
                <span>Bens Ocioso</span>
              </a>
            </li>
            <li>
              <a>
                <span class="icon is-small"><i class="fa fa-film"></i></span>
                <span>Videos</span>
              </a>
            </li>
            <li>
              <a>
                <span class="icon is-small"><i class="fa fa-file-text-o"></i></span>
                <span>Documents</span>
              </a>
            </li>
          </ul>
        </div>
        <section class="container">
          <div  v-if="active==1">
            <div class="widget-user-header bg-aqua-active">
              <p class="successMessage" v-if="successMessage">{{successMessage}}</p>
              <p class="errorMessage" v-if="errorMessage">{{errorMessage}}</p>
            </div>
            <div>
              <a v-on:click="modalDeslocAdd = true" class="button is-primary is-al">
                <i class="fa fa-building-o"></i> Local Add
              </a>
            </div>
            <br>
            <!--grid-local
                :data="locais"
                :columns="gridColumns"
                :filter-key="searchQuery">
            </grid-local-->
            <div v-for="tecnico in oss.tecnicos">
            <p> <a>@{{tecnico.user}} &nbsp;</a><p>
            <div>
              <a v-on:click="modalDeslocAdd = true" class="button is-primary is-al">
                <i class="fa fa-building-o"></i> Delocamento
              </a>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th>DataInicio</th>
                  <th>DataFinal</th>
                  <th>Tempo</th>
                  <th>KmInicio</th>
                  <th>KmFinal</th>
                  <th>Valor</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="mod in tecnico.mods">
                  <th>{{ mod.dtInicio }} </th>
                  <td>{{ mod.dtFianl }}</td>
                  <td>{{ mod.tempo }}</td>
                  <td>{{ mod.KmInicio }}</td>
                  <td>{{ mod.KmFinal }}</td>
                  <td>{{ mod.Valor }}</td>
                  <td>
                    <a v-on:click="modalDeslocAdd = true" class="button is-primary is-al">Editar</a>
                    <a v-on:click="modalDeslocAdd = true" class="button is-primary is-al">Chegada</a>
                  </td>
                </tr>
              </tbody>
            </table>
            
          </div>
          </div>
        </section>
        <deslocamento-add v-if="modalDeslocAdd" v-on:close="modalDeslocAdd = false" :data="loja" @atualizar="onAtualizar"></deslocamento-add>
      </div>
      <!-- /.box -->
    </section>
  </div>
</template>