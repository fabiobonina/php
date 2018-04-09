
<template id="oss-stus">
  <div>
    <nav class="is-right" aria-label="breadcrumbs">
      <ul>
        <li><router-link to="/"> Home</router-link></li>
        <li class="is-active"><a aria-current="page">Os´s</a></li>
      </ul>
    </nav>
    
    <section class="container">
      <div>
        <os-grid
          :data="oss"
          :columns="gridColumns"
          :estado= "estado.nivel0">
        </os-grid>
      </div>
      <!-- /.box -->
    </section>
  </div>
</template>