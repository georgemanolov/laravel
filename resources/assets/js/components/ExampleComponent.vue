<template>
    <div class="container">
        <ul>
            <li v-for="item in data">
                <a href="#" @click.prevent="deleteUser(item)">{{ `${item.email} - ${item.name}` }}</a>
            </li>
        </ul>

        <hr>

        <input v-model="form.name" type="text" placeholder="name">
        <input v-model="form.email" type="text" placeholder="email">
        <input v-model="form.password" type="text" placeholder="password">
        <button @click.prevent="sendFormToServer">Save</button>

    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                data: [],
                form: {
                    name: '',
                    email: '',
                    password: '',
                }

            }
        },
        mounted() {
            axios.get('/api/users').then(response => {
                this.data = response.data
            })
        },
        methods: {
            sendFormToServer() {
                axios.post('/api/users', this.form).then(response => {
                    this.data.push(response.data);
                    this.form = {
                        name: '',
                        email: '',
                        password: '',
                    };
                })
            },
            deleteUser(user){
                axios.delete('/api/users/' + user.id).then(response => {
                    axios.get('/api/users').then(response => {
                        this.data = response.data
                    })
                })
            }
        }
    }
</script>
