<template>
    <tr>
        <th scope="row">{{ house.name }}</th>
        <td>{{ house.price }}</td>
        <td>{{ house.bedrooms }}</td>
        <td>{{ house.bathrooms }}</td>
        <td>{{ house.storeys }}</td>
        <td>{{ house.garages }}</td>
    </tr>
</template>

<script>
export default {
    props: [
        'house'
    ]
}
</script>
