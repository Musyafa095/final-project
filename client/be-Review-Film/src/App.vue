<template>
<header>
<Navbar/>
</header>
<main>
    <Genre/>
    <Movie/>
</main>
</template>

<script setup>
import {onMounted, ref} from 'vue'
import { defineAsyncComponent } from 'vue';

const Navbar = defineAsyncComponent(() => import('@/components/NavBar.vue'));
const Genre = defineAsyncComponent (() => import('@/components/GenreMovie.vue'));
const Movie = defineAsyncComponent(() => import ('@/components/MovieView.vue'))







</script>