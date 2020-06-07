<template>
<div>
<div class="dbody">
    <div class="container" id="container">
    <div class="form-container sign-up-container">
        <div class="form">
            <h1>Create Account</h1>
            <input type="text" placeholder="Name" />
            <input type="text" placeholder="Surname" />
            <input type="email" placeholder="Email" />
            <input type="password" placeholder="Password" />
            <input type="date" placeholder="Birthday" />
            <button @click = "signup">Sign Up</button>
        </div>
    </div>
    <div class="form-container sign-in-container">
        <div class="form">
            <h1>Sign In</h1>
            <input type="email" name="email" id="email" placeholder="Email" />
            <input type="password" name="password" id="password" placeholder="Password" />
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
                data: localStorage.getItem('bearerToken'),
            }
        },
        methods: {
            signin(e) {
                let email = $(e.target).prev().prev().prev().val()
                let password = $(e.target).prev().prev().val()

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
                    console.log(localStorage.getItem('bearerToken'));
                    window.location.href = '/profile';;
                })
                .catch(error => {
                    console.log(error.response.data);
                });
            },
            signup(e) {
                let name = $(e.target).prev().prev().prev().prev().prev().val()
                let surname = $(e.target).prev().prev().prev().prev().val()
                let email = $(e.target).prev().prev().prev().val()
                let password = $(e.target).prev().prev().val()
                let birthday = $(e.target).prev().val()

                this.axios.post('api/user', {
                    email: email,
                    surname: surname,
                    name: name,
                    password: password,
                    birthday: birthday,
                }, 
                {
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    window.location.href = '/signin';
                })
                .catch(error => {
                    console.log(error.response.data);
                });
            },
        }
    }
</script>
<style>
    @import '../../css/login.css';
</style>