<template>
    <div class="container principal">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
                <div class="" v-for="i in 50">
                    <p>{{ i }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('Carga: Principal component.')
    }
}
</script>

<style scoped>
.principal {
    margin-top: 65px;
}
</style>
