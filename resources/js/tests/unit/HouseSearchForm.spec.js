import { mount, flushPromises } from '@vue/test-utils';
import axios from 'axios';
import { describe, it, expect, beforeEach, vi } from 'vitest';
import HouseSearch from '@/components/HouseSearch.vue';

// Mock axios
vi.mock('axios');

describe('HouseSearch.vue', () => {
    let wrapper;

    beforeEach(() => {
        wrapper = mount(HouseSearch);
    });

    it('renders form fields correctly', () => {
        expect(wrapper.find('input#name').exists()).toBe(true);
        expect(wrapper.find('input#bedrooms').exists()).toBe(true);
        expect(wrapper.find('input#bathrooms').exists()).toBe(true);
        expect(wrapper.find('input#storeys').exists()).toBe(true);
        expect(wrapper.find('input#garages').exists()).toBe(true);
        expect(wrapper.find('input#price_min').exists()).toBe(true);
        expect(wrapper.find('input#price_max').exists()).toBe(true);
    });

    // it('fetches houses when form is submitted', async () => {
    //     axios.get.mockImplementationOnce(() =>
    //         new Promise(resolve =>
    //             setTimeout(() => resolve({
    //                 data: [
    //                     { id: 1, name: 'House 1', price: 100000, bedrooms: 3, bathrooms: 2, storeys: 1, garages: 1 }
    //                 ]
    //             }), 100) // 100ms delay
    //         )
    //     );

    //     await wrapper.setData({
    //         searchParams: { name: 'House', bedrooms: 3, bathrooms: 2, storeys: 1, garages: 1, price_min: 80000, price_max: 120000 }
    //     });

    //     await wrapper.find('form').trigger('submit.prevent');

    //     await flushPromises(); // Ensure all promises are resolved

    //     expect(wrapper.vm.houses.length).toBe(1);
    //     expect(wrapper.vm.houses[0].name).toBe('House 1');
    // });

    // it('displays loading indicator', async () => {
    //     axios.get.mockImplementationOnce(() =>
    //         new Promise(resolve =>
    //             setTimeout(() => resolve({ data: [] }), 100) // 100ms delay
    //         )
    //     );

    //     // Trigger form submission
    //     await wrapper.find('form').trigger('submit.prevent');

    //     await wrapper.vm.$nextTick(); // Ensure DOM updates

    //     console.log('Loading state after submit:', wrapper.vm.loading);
    //     console.log('Loading message exists after submit:', wrapper.find('.loading-message').exists());
    //     expect(wrapper.find('.loading-message').exists()).toBe(true);
    //     expect(wrapper.find('.loading-message').text()).toContain('Loading...');

    //     await flushPromises(); // Ensure all promises are resolved

    //     // Check if loading message is hidden
    //     console.log('Loading state after end:', wrapper.vm.loading);
    //     console.log('Loading message exists after end:', wrapper.find('.loading-message').exists());
    //     expect(wrapper.find('.loading-message').exists()).toBe(false);
    // });

    // it('displays no results message', async () => {
    //     axios.get.mockImplementationOnce(() =>
    //         new Promise(resolve =>
    //             setTimeout(() => resolve({ data: [] }), 100) // 100ms delay
    //         )
    //     );

    //     await wrapper.find('form').trigger('submit.prevent');

    //     await flushPromises(); // Ensure all promises are resolved

    //     const noResultsElement = wrapper.find('.no-results-message');
    //     if (noResultsElement.exists()) {
    //         expect(noResultsElement.text()).toContain('No results found.');
    //         expect(noResultsElement.isVisible()).toBe(true);
    //     } else {
    //         throw new Error('No results message not found in DOM');
    //     }
    // });
});
