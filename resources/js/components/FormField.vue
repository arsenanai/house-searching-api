<template>
    <div>
        <label :for="id" class="block text-sm font-medium text-gray-700">{{ label }}</label>
        <input 
            :id="id" 
            :value="modelValue" 
            @input="$emit('update:modelValue', $event.target.value)" 
            :type="type" 
            :placeholder="placeholder" 
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm px-4 py-2"
        >
    </div>
</template>

<script>
export default {
    props: {
        id: {
            type: String,
            required: true
        },
        label: {
            type: String,
            required: true
        },
        modelValue: {
            type: [String, Number],
            default: ''
        },
        type: {
            type: String,
            default: 'text'
        },
        placeholder: {
            type: String,
            default: ''
        }
    }
};
</script>
