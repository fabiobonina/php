
<template id="oss">
    <div>
        <section class="container">
            <div class="tabs is-small">
                <ul>
                <li :class="active==1 ? 'is-active' : ''" @click="active='1'"><a>Operação</a></li>
                <li :class="active==0 ? 'is-active' : ''" @click="active='0'"><a>Instalação</a></li>
                <li :class="active==2 ? 'is-active' : ''" @click="active='2'"><a>Ocioso</a></li>
                </ul>
            </div>
        </section>
        <br>
        <section class="container">
            <div class="columns is-multiline  is-mobile">
                <div v-for=" osLoja in osLojas" class="column is-one-third ">
                    <div class="card">
                        <header class="card-header">
                        <p class="card-header-title"><a :href="'#/loja/' + osLoja.id +'/oss-loja'" class="product-title">{{osLoja.nick}}</a></p>
                            <a href="#" class="card-header-icon" aria-label="more options">
                                <span class="icon">
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </span>
                            </a>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <nav class="level">
                                    <div class="level-item has-text-centered">
                                        <div>
                                            <p class="heading">OS´s <span class="mdi mdi-wrench"></span></p>
                                            <p class="title"> {{ osLoja.osQt }} </p>
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
                        <footer class="card-footer">
                        </footer>
                    </div>
                </div>
            </div>
        </section>
    </div>      
</template>
