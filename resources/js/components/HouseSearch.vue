<template>
    <el-card class="search-card">
        <el-form @submit.prevent="searchHouses" label-position="top">
            <div class="form-grid">
                <FormField 
                    v-for="(field, index) in fields" 
                    :key="index" 
                    :label="field.label" 
                    :modelValue="searchParams[field.model]"
                    @update:modelValue="value => searchParams[field.model] = value"
                    :type="field.type" 
                />
                <PriceRange 
                    :priceMin="searchParams.price_min" 
                    @update:priceMin="value => searchParams.price_min = value"
                    :priceMax="searchParams.price_max" 
                    @update:priceMax="value => searchParams.price_max = value"
                />
            </div>
            <el-button type="primary" native-type="submit" class="search-button">Search</el-button>
        </el-form>
        <div class="result-area">
            <el-loading v-if="loading" :lock="true" text="Loading..."></el-loading>
            <el-alert v-if="houses.length === 0 && !loading" class="mt-4" title="No results found" type="info"></el-alert>
            <HouseRow v-if="houses.length > 0" :houses="houses" />
        </div>
    </el-card>
</template>

<script>
import axios from 'axios';
import FormField from './FormField.vue';
import PriceRange from './PriceRange.vue';
import HouseRow from './HouseRow.vue';

export default {
    components: { FormField, PriceRange, HouseRow },
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
                { label: 'Name', model: 'name', type: 'text' },
                { label: 'Bedrooms', model: 'bedrooms', type: 'number' },
                { label: 'Bathrooms', model: 'bathrooms', type: 'number' },
                { label: 'Storeys', model: 'storeys', type: 'number' },
                { label: 'Garages', model: 'garages', type: 'number' }
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

<style>
.search-card {
    padding: 24px;
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

.search-button {
    margin-top: 16px;
}

.result-area {
    margin-top: 24px;
}

@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
    }

    .price-col {
        margin-bottom: 16px;
    }
}
</style>
