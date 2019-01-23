
<template id="oss-home">
    <div>
        <section class="container">
            <div class="tabs is-small">
                <ul>
                    <li :class="$route.path == '/oss' ? 'is-active' : ''" ><a href="#/oss">Oss</a></li>
                    <li :class="$route.path == '/oss/oss-tec' ? 'is-active' : ''" ><a href="#/oss/oss-tec">OS´s Tec</a></li>
                    <li :class="$route.path == '/oss/oss-status' ? 'is-active' : ''" ><a href="#/oss/oss-status" >OS´s Status</a></li>
                </ul>
            </div>
        </section>
        <br>
        <div>
           <router-view></router-view>
        </div>
    </div>      
</template>
