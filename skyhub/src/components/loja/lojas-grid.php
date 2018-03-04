<template id="grid-lojas">
  <div>
    <section class="container">      
      <div class="box content">
        <article class="post" v-for="entry in filteredData">
          <div class="columns">
            <div class="column is-6">
              <a :href="'#/loja/' + entry.id" class="product-title"><h5>{{entry.nick}}</h5></a>
              <span class="pull-right has-text-grey-light"><i class="fa fa-comments"></i> 1</span>
              <div class="media">
                <div class="media-left">
                  <p class="image is-32x32">
                    <img src="http://bulma.io/images/placeholders/128x128.png">
                  </p>
                </div>
                <div class="media-content">
                  <div class="content">
                    <p>
                      <a href="#">@teste</a> {{entry.name}}  &nbsp;
                      <span class="tag" v-for="categoria in entry.categoria">{{ categoria.tag }} </span> 
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="column is-6">
              <nav class="level">
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Local: <i class="fa fa-building-o"></i> {{ entry.locaisQt }}</p>
                    <p><i class="fa fa-map-marker"></i> {{ entry.locaisGeoStatus }}% ({{ entry.locaisGeoQt }})</span></p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Following</p>
                    <p class="title">123</p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Followers</p>
                    <p class="title">456K</p>
                  </div>
                </div>
                <div class="level-item has-text-centered">
                  <div>
                    <p class="heading">Ação</p>
                    <div class="dropdown is-right is-hoverable">
                      <div class="dropdown-trigger">
                        <button class="button  is-text" aria-haspopup="true" aria-controls="dropdown-menu1">
                          <span class="icon is-small">
                            <span class="mdi mdi-dots-vertical"></span>
                          </span>
                        </button>
                      </div>
                      <div class="dropdown-menu" id="dropdown-menu1" role="menu">
                        <div class="dropdown-content">
                          <a @click="modalEdt = true; selecItem(entry)" class="dropdown-item">
                            <span class="mdi mdi-pencil"></span>Edit
                          </a>
                          <a @click="modalDel = true; selecItem(entry)" class="dropdown-item">
                            <span class="mdi mdi-delete"></span>Delete
                          </a>
                          <a @click="modalCat = true; selecItem(entry)" class="dropdown-item">
                            <span class="mdi mdi-tag-multiple"></span>Categoria
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </article>
      </div>
    </section>
    <div>
      <loja-edt v-if="modalEdt" v-on:close="modalEdt = false" :data="modalItem" @atualizar="onAtualizar"></loja-edt>
      <loja-del v-if="modalDel" v-on:close="modalDel = false" :data="modalItem" @atualizar="onAtualizar"></loja-del>
      <loja-cat v-if="modalCat" v-on:close="modalCat = false" :data="modalItem" @atualizar="onAtualizar"></loja-cat>
    </div>
  </div>
</template>