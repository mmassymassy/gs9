<template>
    <div class="">
        <div class="row justify-content-center">
           <router-view></router-view>
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
