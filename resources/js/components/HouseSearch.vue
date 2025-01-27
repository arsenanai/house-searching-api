<template>
    <div class="p-6">
        <form @submit.prevent="searchHouses" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <FormField v-for="(field, index) in fields" :key="index" :id="field.id" :label="field.label" :type="field.type" v-model="searchParams[field.id]" />
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Price Range</label>
                    <div class="flex space-x-4">
                        <FormField id="price_min" label="Min Price" type="number" placeholder="Min Price" v-model="searchParams.price_min" />
                        <FormField id="price_max" label="Max Price" type="number" placeholder="Max Price" v-model="searchParams.price_max" />
                    </div>
                </div>
            </div>
            <button type="submit" class="w-full md:w-auto px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm">Search</button>
        </form>
        <div v-if="loading" class="mt-4 loading-message">Loading...</div>
        <div v-if="houses.length === 0 && !loading" class="mt-4 no-results-message">No results found.</div>
        <div class="w-full overflow-x-auto">
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
                    <HouseRow v-for="house in houses" :key="house.id" :house="house" />
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import FormField from './FormField.vue';
import HouseRow from './HouseRow.vue';

export default {
    components: { FormField, HouseRow },
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
            },
            fields: [
                { id: 'name', label: 'Name', type: 'text' },
                { id: 'bedrooms', label: 'Bedrooms', type: 'number' },
                { id: 'bathrooms', label: 'Bathrooms', type: 'number' },
                { id: 'storeys', label: 'Storeys', type: 'number' },
                { id: 'garages', label: 'Garages', type: 'number' },
            ]
        };
    },
    methods: {
        async searchHouses() {
            console.log('searchHouses method called'); // Debugging
            this.loading = true;
            console.log('Loading state set to true'); // Debugging
            try {
                const response = await axios.get('/api/houses', { params: this.searchParams });
                console.log('API response received'); // Debugging
                this.houses = response.data;
            } catch (error) {
                console.error(error);
                this.houses = []; // Ensure houses is reset on error
            } finally {
                this.loading = false;
                console.log('Loading state set to false'); // Debugging
            }
        }
    }
};
</script>
