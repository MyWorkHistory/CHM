<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { UploadMedia, UpdateMedia } from 'vue-media-upload';
import axios from 'axios';
</script>

<template>

    <Head title="New listing" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between h-16">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create a listing</h2>
                </div>
                <div>
                    <Link :href="route('home')">
                    <PrimaryButton class="position-absolute top-0 end-0">
                        Go back
                    </PrimaryButton>
                    </Link>
                </div>
            </div>
        </template>


        <div class="py-12 register-form-column">
            <form v-on:submit.prevent="createProduct" enctype="multipart/form-data">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">

                            <p>* are required</p>
                            <div class="form-wrapper">
                                <label for="english_skill"> English skills </label>
                                <select name="english_skill" id="english_skill" v-model="fields.english_skill"
                                    class="form-control">
                                    <option value="None">None</option>
                                    <option value="Poor">Poor</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Good">Good</option>
                                    <option value="Perfect">Perfect</option>
                                </select>

                            </div>
                            <br />
                            <div class="form-wrapper">
                                <label for="location"> Location * </label>
                                <input type="text" name="location" id="location" v-model="fields.location"
                                    placeholder="Enter location of the model" class="form-control" required>
                            </div>
                            <br />
                            <div class="form-wrapper">
                                <label for="height"> Height in CM </label>
                                <input type="number" name="height" id="height" v-model="fields.height"
                                    placeholder="Enter height of the model" class="form-control">
                            </div>
                            <br />
                            <div class="form-wrapper">
                                <label for="phone"> Phone type </label>
                                <input type="text" name="phone" id="phone" v-model="fields.phone" placeholder="e.g Iphone 12"
                                    class="form-control">
                            </div>
                            <br />
                            <div class="form-wrapper">
                                <label for="contract_signed"> Active contracts </label>
                                <select v-model="fields.contract_signed">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    <option value="other">Other</option>
                                </select>
                                <input type="text" v-if="contract_signed === 'other'" name="contract_signed"
                                    id="contract_signed" v-model="fields.contract_signed" placeholder="e.g Iphone 12"
                                    class="form-control">
                            </div>
                            <br />
                            <div class="form-wrapper">
                                <label for="available_start_date"> Available starting date </label>
                                <input type="text" name="available_start_date" id="available_start_date"
                                    v-model="fields.available_start_date" placeholder="" class="form-control">
                            </div>
                            <br />
                            <div class="form-wrapper">
                                <label for="warranty"> Warranty </label>
                                <select v-model="fields.warranty">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <input type="text" v-if="warranty_status === 'yes'" name="warranty" id="warranty"
                                    v-model="fields.warranty" placeholder="Type number in months" class="form-control">
                            </div>
                            <br />
                            <div class="form-wrapper">
                                <label for="years_of_experience"> Years of experience</label>
                                <input type="number" name="years_of_experience" id="years_of_experience"
                                    v-model="fields.years_of_experience" placeholder="No decimals" class="form-control">
                            </div>
                            <br />
                            <div class="form-wrapper">
                                <label for="gender"> Gender * </label>
                                <select name="gender" id="gender" v-model="fields.gender" class="form-control" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <br />
                            <div class="form-wrapper">
                                <label for="price"> Price </label>
                                <input type="number" name="price" id="price" ref="image" v-model="fields.price"  placeholder="No decimals"
                                    class="form-control">
                            </div>
                            <br />
                            <div class="form-wrapper">
                                <label for="image"> image </label>
                                <input type="file" name="image" id="image" v-on:change="updateImage" class="form-control"/>
                            </div>
                            <br/>
                            <div class="form-wrapper">
                                <label for="note"> Note's </label>
                                <input type="number" name="note" id="note" v-model="fields.note"
                                    placeholder="Any note's may be added here" class="form-control">
                            </div>
                            <br />
                            <div>
                                <button type="submit">submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </AuthenticatedLayout>


</template>
<script>
export default {
    data() {
        return {
            contract_signed_status: 'no',
            contract_signed: '',
            warranty_status: 'no',
            fields: {
     english_skill: '',
     location: '',  
     height: '', 
     phone: '',
     contract_signed: '',
     available_start_date: '',
     warranty: '',
     years_of_experience: '',
     gender: '', 
     price: '',
     note: '',
     image: [],
            },
            errors: {},
        }
    },
        methods: {
            updateImage(event) {
                this.fields.image.push(event.target.files[0]);
            },

            createProduct() 
            {
        this.errors = {};
        axios.post('/create', this.fields,
         { headers: 
            { 'Content-Type': 'multipart/form-data'}
        }).then(response => {
         alert('listing has been made');
      
        }).catch(error => {
            if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
            }
        });

        },

    },
}

</script>