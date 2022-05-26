<template>
    <div class="nav">
        <div class="div-logo">
            <a href="/" class="link-home">
                <img src="supermarket.png" alt="logo" class="logo">
            </a>
        </div>
        <div class="company">
            <a href="/" class="link-home">
                <span class="nameCompany">MarketStore</span>
                <span class="sloganCompany">e-Commerce Testing</span>
            </a>
        </div>
        <div class="btn-group buttons" role="group">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                aria-expanded="false">{{ user || "Perfil" }}</a>
            <ul class="dropdown-menu" v-if="user">
                <li>
                    <a class="dropdown-item" href="#">
                        <span class="material-icons-round">
                            manage_accounts
                        </span>
                        Perfil
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <span class="material-icons-round">
                            shopping_cart_checkout
                        </span>
                        Carrito
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item" href="#" @click="logout()">
                        <span class="material-icons-round">
                            logout
                        </span>
                        Cerrar Sesion
                    </a>
                </li>
            </ul>
            <ul class="dropdown-menu" v-if="!user">
                <li>
                    <a class="dropdown-item" href="/login">
                        <span class="material-icons-round">
                            login
                        </span>
                        Iniciar Sesion
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: ['user'],
    mounted() {
        console.log('Carga: NavBar component.')
    },
    methods: {
        async logout() {
            const res_logout = await this.callApi('post', '/api/logout');
            localStorage.removeItem('token');
            window.location.assign('/');
        },
    }
}
</script>

<style scoped>
* {
    text-decoration: none;
}

.link-home {
    color: #fff;
}

.nav {
    background-color: #5f3fc9;
    align-content: center;
    width: 100%;
    color: #fff;
    top: 0;
    position: fixed;
    z-index: 2;
}

img.logo {
    width: 25px;
    min-height: 0px;
}

div.div-logo {
    margin: 10px 2px 10px 10px;
    display: inline-block;
    background-color: #fff;
    border-radius: 35%;
    padding: .4rem;
}

div.company {
    margin: auto auto auto 2px;
    display: inline-block;
}

.nameCompany {
    font-size: 20px;
    margin-bottom: 0;
    display: block;
}

.sloganCompany {
    font-size: 8px;
    margin-top: -10px;
    display: block;
}

div.buttons {
    right: 0;
    margin: auto 0;
    display: inline-block;
}

.nav-link {
    color: #fff;
}

.dropdown-menu,
.material-icons-round {
    font-size: 0.9rem !important;
}
</style>
