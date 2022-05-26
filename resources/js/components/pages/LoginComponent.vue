<template>
    <div v-if="this.isLogged" class="l-body">
        <div class="container login-table">
            <span class="material-icons-round mat-login">
                person_pin
            </span>
            <h3 class="text-center">INICIA SESIÓN</h3>
            <form @submit.prevent="login">
                <div class="form-floating inputs">
                    <input id="email-login" type="email" class="form-control" placeholder="name@example.com"
                        v-model="data.email">
                    <label for="email-login">Email</label>
                </div>
                <div class="form-floating inputs">
                    <input id="password-login" type="password" class="form-control" placeholder="Password"
                        v-model="data.password">
                    <label for="password-login">Contraseña</label>
                </div>
                <button type="submit" class="btn btn-primary inputs">INICIAR SESION</button>
            </form>
            <div>
                <p>¿Aún no tienes una cuenta? <a href="/register"><span><b>Regístrate</b></span></a></p>
                <p>Iniciar sesión mas tarde... <a href="/"><span><b>Regresas</b></span></a></p>
            </div>
            <div v-if="this.showAlert" class="alert alert-primary d-flex align-items-center" role="alert">
                <span class="material-icons-round">
                    info
                </span>
                <div>
                    {{ this.message }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            data: {},
            message: '',
            showAlert: false,
            isLogged: false,
        }
    },
    mounted() {
        console.log('Carga: Login component.')
        if (localStorage.getItem('token')) {
            window.location.assign('/');
        } else this.isLogged = true;
    },
    methods: {
        textAlert(m) {
            this.message = m
            this.showAlert = true
            setTimeout(() => this.showAlert = false, 5000)
        },
        async login() {
            if (!this.data.email) return this.textAlert('Ingresa tu email');
            if (!this.data.password) return this.textAlert('Ingresa tu contraseña');
            const res_login = await this.callApi('post', '/api/login', this.data);
            console.log(res_login);
            if (res_login.status == 206) {
                this.textAlert('Pendiente. Intenta mas tarde');
                return;
            } else if (res_login.status == 200) {
                localStorage.setItem('token', res_login.data.data.accessToken);
                window.location.assign('/');
            } else if (res_login.status == 401) {
                this.textAlert('usuario o contraseña incorrectos');
            }
        }
    }
}
</script>

<style scoped>
* {
    text-decoration: none;
}

.mat-login {
    font-size: 100px;
    color: #AAA;
}

.inputs {
    margin: 10px 0;
}

.l-body {
    width: 100%;
}

.login-table {
    width: 350px;
    margin: 20vh auto;
    text-align: center;
}

div.alert-primary > span,
div.alert-primary > div {
    color: #084298;
}

div > p {
    margin-bottom: 0;
}
</style>
