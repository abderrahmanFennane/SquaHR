<template lang="">
    <div>
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
            <router-link class="navbar-brand" :to="{name: 'Home'}">Coding-challenge</router-link>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavId">
                <ul class="navbar-nav mt-2 mt-lg-0">
                    <li v-if="!authenticated" class="nav-item active">
                        <router-link class="nav-link" :to="{name: 'Signin'}">Signin </router-link>
                    </li>

                     <li v-if="authenticated" class="nav-item active">
                        <a class="nav-link" href="#">{{ user.name }} </a>
                    </li>

                     <li v-if="authenticated" class="nav-item active">
                        <a @click="logOut()" class="nav-link" href="#">Logout </a>
                    </li>
                  
                </ul>
            </div>
        </nav>
    </div>
</template>
<script>
import { mapGetters, mapActions } from 'vuex' 
export default {
    computed: {
        ...mapGetters({
            'authenticated': 'auth/authenticated',
            'user': 'auth/user'
        })
    },
    methods: {
        ...mapActions({
            'signOut': 'auth/signOut'
        }),
        logOut() {
            this.signOut().then(() => this.$router.replace({ name: 'Home' }))
        }
    }
}
</script>
<style lang="">
    
</style>