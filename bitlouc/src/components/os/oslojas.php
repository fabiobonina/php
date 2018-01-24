
<template id="os-lojas">
    <div class="columns is-gapless is-multiline is-mobile">
        <div v-for=" osLoja in osLojas" class="column is-half">
            <div class="card">
                <header class="card-header">
                <p class="card-header-title"><a :href="'#/oss/' + osLoja.id" class="product-title">{{osLoja.nick}}</a></p>
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
                                    <p class="heading">OS´s</p>
                                    <p class="title"> {{ osLoja.osQt }} <span class="icon is-small has-text-warning"><i class="fa fa-wrench"></i></span></p>
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
                        Lorem 
                        <a href="#">@bulmaio</a>. <a href="#">#css</a> <a href="#">#responsive</a>
                        <br>
                        <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                    </div>
                </div>
                <footer class="card-footer">
                    <a href="#" class="card-footer-item">Save</a>
                    <a href="#" class="card-footer-item">Edit</a>
                    <a href="#" class="card-footer-item">Delete</a>
                </footer>
            </div>
        </div>
    </div>
</template>
