<template>
    <div class="overflow-x-auto">
        <el-table :data="houses" border>
            <el-table-column prop="name" label="Name" />
            <el-table-column prop="price" label="Price" />
            <el-table-column prop="bedrooms" label="Bedrooms" />
            <el-table-column prop="bathrooms" label="Bathrooms" />
            <el-table-column prop="storeys" label="Storeys" />
            <el-table-column prop="garages" label="Garages" />
        </el-table>
    </div>
</template>

<script>
export default {
    props: {
        houses: {
            type: Array,
            required: true
        }
    }
};
</script>
