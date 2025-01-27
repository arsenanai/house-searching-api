<template>
    <el-form-item :label="label" label-position="top">
        <el-input 
            v-if="type === 'text'" 
            :model-value="modelValue"
            @input="$emit('update:modelValue', $event)" 
        />
        <el-input-number 
            v-else 
            :model-value="modelValue"
            @update:modelValue="$emit('update:modelValue', $event)" 
            controls-position="right"
        />
    </el-form-item>
</template>

<script>
export default {
    props: {
        label: {
            type: String,
            required: true
        },
        modelValue: {
            type: [String, Number],
            required: true
        },
        type: {
            type: String,
            default: 'text'
        }
    }
};
</script>
