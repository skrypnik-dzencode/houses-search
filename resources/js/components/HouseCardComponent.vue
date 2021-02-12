<template>
    <div class="card mr-5 mt-4">
        <div class="card-header">
            {{house.name}}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Prise: <strong>{{house.price}}</strong></li>
            <li class="list-group-item">Bedrooms: <strong>{{house.bedrooms}}</strong></li>
            <li class="list-group-item">Bathrooms: <strong>{{house.bathrooms}}</strong></li>
            <li class="list-group-item">Storeys: <strong>{{house.storeys}}</strong></li>
            <li class="list-group-item">Garages: <strong>{{house.garages}}</strong></li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: [
            'house'
        ]
    }
</script>
