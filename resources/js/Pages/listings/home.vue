<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    listings: Array,
});
</script>


<template>

    <Head title="Listings" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between h-16">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Listings</h2>
                </div>
                <div>
                    <Link :href="route('create-product-view')">
                    <PrimaryButton class="position-absolute top-0 end-0">
                        Create listing
                    </PrimaryButton>
                    </Link>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg listContainer">

                    <div v-for="listing in listings" class="card">
                        <Link :href="route('inspect', { id: listing.id})" @click.prevent="inspectListing(listing.id)">
                            <div>
                                <div class="singlecard">
                                    <img class="card-image" v-show="listing.image != null"
                                        :src="'/storage/models/' + listing.image" />
                                    <p className="border px-4 py-2">Gender: {{ listing.gender }}</p>
                                    <p className="border px-4 py-2">Location : {{ listing.location }}</p>
                                    <p className="border px-4 py-2">Height of the model : {{ listing.height }} CM</p>
                                </div>
                            </div>
                        </Link>
                    </div>

                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
<script>
export default {
    methods: {
        inspectListing(id) {
            // Make an axios call to your controller here, passing in the id as a parameter
            axios.get(`/inspect/${id}`)
                .then(response => {
                    // Do something with the response here
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>

<style>
.listContainer {
    max-width: 100%;
    display: flex;
    flex-wrap: wrap;
}

.card {
    margin: 10px;
    width: 31%;
    height: auto;
   
    margin-right: 1%;
    display: inline-block;
    vertical-align: middle;
    /* or margin-left */
}

.card-image {
    max-height: 300px;
    vertical-align: middle;
    
}
.singlecard {
    max-height: 450px;
}

@media screen and (max-width: 480px) {
    .listContainer {
    max-width: 100%;
    display: flex;
    flex-wrap: wrap;
}
.singlecard{
    margin-bottom: 30px;
}

.card {
    margin: 10px;
    width: 90%;
    
    height: auto;
   
    margin-right: 1%;
    /* or margin-left */
}
}

@media screen and (min-width: 481px) and ( max-width: 940px){
    .listContainer {
    max-width: 100%;
    display: flex;
    flex-wrap: wrap;
}
.singlecard{
    margin-bottom: 30px;
}

.card {
    margin: 10px;
    width: 45%;
    
    height: auto;
   
    margin-right: 1%;
    /* or margin-left */
}
}
</style>
