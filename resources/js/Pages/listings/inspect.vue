<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { UploadMedia, UpdateMedia } from 'vue-media-upload';
import axios from 'axios';

defineProps({
    one_listing: Array,
});
</script>

<template>
    <Head title="Listings" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between h-16">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">  <Link :href="route('home')">
                    <PrimaryButton class="position-absolute top-0 end-0">
                        Go back
                    </PrimaryButton>
                    </Link></h2>
                </div>
           
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg listContainer">
                    <div class="inspectcard">
                        <div>
                            <div class="leftcard">
                                <img class="card-image" v-show="one_listing.image != null"
                                    :src="'/storage/models/' + one_listing.image" />
                            </div>
                            <div class="rightcard">
                                <p className="border px-4 py-2">Gender: {{ one_listing.gender }}</p>
                                <p className="border px-4 py-2">Location : {{ one_listing.location }}</p>
                                <p className="border px-4 py-2">Height of the model : {{ one_listing.height }} CM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<style>
.inspectcard {
    min-width: 70%;
    max-width: 70%;
    height: auto;
    display: flex;
    margin: 10px;
}
.leftcard{
float: left;
width: 50%;
height: auto;
}
.rightcard{
    width: 50%;
float: right;
}
</style>