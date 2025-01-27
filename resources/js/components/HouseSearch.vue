<template>
    <div class="p-6">
        <form @submit.prevent="searchHouses" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input v-model="searchParams.name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Bedrooms</label>
                    <input v-model="searchParams.bedrooms" type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Bathrooms</label>
                    <input v-model="searchParams.bathrooms" type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Storeys</label>
                    <input v-model="searchParams.storeys" type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Garages</label>
                    <input v-model="searchParams.garages" type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Price Range</label>
                    <div class="flex space-x-4">
                        <input v-model="searchParams.price_min" placeholder="Min Price" type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <input v-model="searchParams.price_max" placeholder="Max Price" type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                </div>
            </div>
            <button type="submit" class="w-full md:w-auto px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm">Search</button>
        </form>
        <div v-if="loading" class="mt-4">Loading...</div>
        <div v-if="houses.length === 0 && !loading" class="mt-4">No results found.</div>
        <table v-if="houses.length > 0" class="mt-4 w-full border-collapse">
            <thead>
                <tr>
                    <th class="border-b py-2 px-4 text-left">Name</th>
                    <th class="border-b py-2 px-4 text-left">Price</th>
                    <th class="border-b py-2 px-4 text-left">Bedrooms</th>
                    <th class="border-b py-2 px-4 text-left">Bathrooms</th>
                    <th class="border-b py-2 px-4 text-left">Storeys</th>
                    <th class="border-b py-2 px-4 text-left">Garages</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="house in houses" :key="house.id">
                    <td class="border-b py-2 px-4">{{ house.name }}</td>
                    <td class="border-b py-2 px-4">{{ house.price }}</td>
                    <td class="border-b py-2 px-4">{{ house.bedrooms }}</td>
                    <td class="border-b py-2 px-4">{{ house.bathrooms }}</td>
                    <td class="border-b py-2 px-4">{{ house.storeys }}</td>
                    <td class="border-b py-2 px-4">{{ house.garages }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            houses: [],
            loading: false,
            searchParams: {
                name: '',
                bedrooms: '',
                bathrooms: '',
                storeys: '',
                garages: '',
                price_min: '',
                price_max: ''
            }
        };
    },
    methods: {
        searchHouses() {
            this.loading = true;
            axios.get('/api/houses', { params: this.searchParams })
                .then(response => {
                    this.houses = response.data;
                    this.loading = false;
                })
                .catch(error => {
                    console.error(error);
                    this.loading = false;
                });
        }
    }
};
</script>
