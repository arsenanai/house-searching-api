<template>
    <el-form-item label="Price Range" label-position="top" class="price-range">
        <el-row :gutter="20" class="price-row">
            <el-col :span="12" class="price-col">
                <el-input-number 
                    :model-value="priceMin"
                    @update:modelValue="$emit('update:priceMin', $event)"
                    placeholder="Min Price" 
                    controls-position="right"
                />
            </el-col>
            <el-col :span="12" class="price-col">
                <el-input-number 
                    :model-value="priceMax"
                    @update:modelValue="$emit('update:priceMax', $event)"
                    placeholder="Max Price" 
                    controls-position="right"
                />
            </el-col>
        </el-row>
    </el-form-item>
</template>

<script>
export default {
    props: {
        priceMin: {
            type: Number,
            required: true
        },
        priceMax: {
            type: Number,
            required: true
        }
    }
};
</script>

<style scoped>
.price-row {
    display: flex;
    flex-wrap: wrap;
}

.price-col {
    width: 100%;
}

@media (min-width: 769px) {
    .price-col {
        width: 50%;
    }
}
</style>
