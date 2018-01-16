<template id="grid-lojas">
  <div>
    <section class="container">
      <a class="button is-primary is-block is-al is-large" href="#">New Post</a>
      
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
              </nav>
            </div>
          </div>
        </article>
      </div>
    </section>
    <div class="box-body">
      <div class="box-header with-border">
        <h3 class="title">Lojas</h3>
      </div>
    </div>
  </div>
</template>