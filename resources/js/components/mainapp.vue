<template>
    <div>
        <div>PAGINA PRINCIPAL</div>
        <router-view/>
    </div>
</template>

<script>
export default {
    props: ['user', 'permission'],
    data() {
        return {
            isLoggedIn: false,
        }
    },
    created() {
        this.$store.commit('setUpdateUser', this.user)
        this.$store.commit('setUserPermission', this.permission)
    }
}
</script>
