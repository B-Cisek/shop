<script setup lang="ts">
import Navigation from "@/Components/Navigation.vue";
import ShoppingCart from "@/Components/ShoppingCart.vue";
import Footer from "@/Components/Footer.vue";
</script>

<template>
    <div>
        <Navigation/>
        <main class="max-w-7xl mx-auto">
            <slot/>
        </main>
        <Footer/>
        <ShoppingCart/>
    </div>
</template>
