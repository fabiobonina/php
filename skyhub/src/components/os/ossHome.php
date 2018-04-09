
<template id="oss-home">
    <div>
        <section class="container">
            <div class="tabs is-small">
                <ul>
                    <li :class="$route.path == '/oss' ? 'is-active' : ''" ><a><router-link to="/oss">Oss</router-link></a></li>
                    <li :class="$route.path == '/oss/oss-status' ? 'is-active' : ''" ><a><router-link to="/oss/oss-status">OS´s Status</router-link></a></li>
                </ul>
            </div>
        </section>
        <br>
        <div>
           <router-view></router-view>
        </div>
        
    </div>      
</template>
