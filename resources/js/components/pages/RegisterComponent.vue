<template>
    <div v-if="this.forRegister" class="r-body">
        <div class="container register-table">
            <span class="material-icons-round">
                person_add
            </span>
            <div class="container register-form">
                <h3 class="text-center">REGÍSTATE</h3>
                <form @submit.prevent="registration">
                    <div class="form-floating inputs">
                        <input id="names-register" type="text" class="form-control" placeholder="name"
                            v-model="data.name">
                        <label for="names-register">Nombres</label>
                    </div>
                    <div class="form-floating inputs">
                        <input id="email-register" type="email" class="form-control" placeholder="name@example.com"
                            v-model="data.email">
                        <label for="email-register">Email</label>
                    </div>
                    <div class="form-floating inputs">
                        <input id="password-register" type="password" class="form-control" placeholder="Password"
                            v-model="data.password">
                        <label for="password-register">Contraseña</label>
                    </div>
                    <button type="submit" class="btn btn-primary inputs">REGISTRARSE</button>
                </form>
            </div>
            <div>
                <p>¿Ya tienes una cuenta? <a href="/login"><span><b>Regresar</b></span></a></p>
            </div>
            <div v-if="trueRegister">
                <p>Usuario registrado con éxito</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            data: {},
            forRegister: false,
            trueRegister: false
        }
    },
    mounted() {
        console.log('Carga: Register component.')
        if (localStorage.getItem('token')) {
            window.location.assign('/');
        } else this.forRegister = true;
    },
    methods: {
        async registration() {
            const res_signup = await this.callApi('post', '/api/signup', this.data);
            console.log(res_signup);
            if (res_signup.status == 206) {
                console.log(res_signup.data.data.message);
                return;
            } else if (res_signup.status == 201) {
                console.log(`Usuario logeado: ${res_signup.data.data.user.email}`);
                this.trueRegister = true;
                setTimeout(() => window.location.assign('/login'), 1500);
            }
        }
    }
}
</script>


<style scoped>
* {
    text-decoration: none;
}

.material-icons-round {
    font-size: 100px;
    color: #AAA;
}

img.logo {
    width: 80px;
    margin: 20px auto;
}

.r-body {
    width: 100%;
}

.register-table {
    width: 400px;
    margin: 15vh auto;
    text-align: center;
}

.register-form {
    background-color: #ECECEC;
    padding: 30px;
    border-radius: .7rem;
}

.inputs {
    margin: 10px 0;
}
</style>
