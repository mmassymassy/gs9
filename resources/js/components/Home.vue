<template>
    <div class="container">
        <div class="row justify-content-center">
           <h1>this is the home compoennt</h1>
           <router-link to="/clients">Clients</router-link>
           <router-link to="/clients/create">Create Clients</router-link>

        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
