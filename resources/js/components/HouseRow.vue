<template>
    <tr>
        <td class="border-b py-2 px-4">{{ house.name }}</td>
        <td class="border-b py-2 px-4">{{ house.price }}</td>
        <td class="border-b py-2 px-4">{{ house.bedrooms }}</td>
        <td class="border-b py-2 px-4">{{ house.bathrooms }}</td>
        <td class="border-b py-2 px-4">{{ house.storeys }}</td>
        <td class="border-b py-2 px-4">{{ house.garages }}</td>
    </tr>
</template>

<script>
export default {
    props: {
        house: {
            type: Object,
            required: true
        }
    }
};
</script>
