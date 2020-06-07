<template>
<div>
<div class="dbody">
    <div class="container" id="container">
    <div class="form-container sign-up-container">
        <div id="sign-up-form" class="form">
            <h1>Create Account</h1>
            <p class="text-danger mt-2 mb-2" v-if="errors.signUp.message">{{ errors.signUp.message }}</p>
            <input type="text" name="name" placeholder="Name" />
            <span class="input-error" v-if="errors.signUp.name">{{ errors.signUp.name[0] }}</span>
            <input type="email" name="email" placeholder="Email" />
            <span class="input-error" v-if="errors.signUp.email">{{ errors.signUp.email[0] }}</span>
            <input type="password" name="password" placeholder="Password" />
            <span class="input-error" v-if="errors.signUp.password">{{ errors.signUp.password[0] }}</span>
            <button @click = "signup">Sign Up</button>
        </div>
    </div>
    <div class="form-container sign-in-container">
        <div id="sign-in-form" class="form">
            <h1>Sign In</h1>
            <p class="text-danger mt-2 mb-2" v-if="errors.signIn.message">{{ errors.signIn.message }}</p>
            <input type="email" name="email" id="email" placeholder="Email" />
            <span class="input-error" v-if="errors.signIn.email">{{ errors.signIn.email[0] }}</span>
            <input type="password" name="password" id="password" placeholder="Password" />
            <span class="input-error" v-if="errors.signIn.password">{{ errors.signIn.password[0] }}</span>
            <a href="#">Forgot your password?</a>
            <button @click = "signin">Sign In</button>
        </div>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</template>
<script >
    export default{
        data() {
            return {
                signInForm: null,
                signUpForm: null,
                errors: {
                    signIn: {},
                    signUp: {},
                },
            }
        },
        mounted() {
            this.signInForm = document.getElementById('sign-in-form');
            this.signUpForm = document.getElementById('sign-up-form');

            const signUpButton = document.getElementById('signUp');
            const signInButton = document.getElementById('signIn');
            const container = document.getElementById('container');

            signUpButton.addEventListener('click', () => {
                container.classList.add("right-panel-active");
            });

            signInButton.addEventListener('click', () => {
                container.classList.remove("right-panel-active");
            });
        },
        methods: {
            signin(e) {
                const email = this.signInForm.querySelector('input[name="email"]').value
                const password = this.signInForm.querySelector('input[name="password"]').value;

                this.axios.post('api/login', {
                    email: email,
                    password: password
                }, 
                {
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    localStorage.setItem('bearerToken', response.data.token);
                    window.location.href = '/newcv';;
                })
                .catch(error => {
                    this.errors.signIn = error.response.data.errors || {};
                    this.errors.signIn.message = error.response.data.message;
                });
            },
            signup(e) {
                const name = this.signUpForm.querySelector('input[name="name"]').value
                const email = this.signUpForm.querySelector('input[name="email"]').value
                const password = this.signUpForm.querySelector('input[name="password"]').value;

                this.axios.post('api/user', {
                    email: email,
                    name: name,
                    password: password,
                }, {
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    window.location.href = '/signin';
                })
                .catch(error => {
                    this.errors.signUp = error.response.data.errors || {};
                    this.errors.signUp.message = error.response.data.message;
                });
            },
        }
    }
</script>
<style>
    @import '../../css/login.css';
</style>