<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form v-on:change="filterHouses" v-on:keyup="filterHouses">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" v-model="name" class="form-control" id="name"
                               aria-describedby="nameHelp"
                               placeholder="The name">
                        <small id="nameHelp" class="form-text alert-danger"></small>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group mr-5">
                            <label for="bedrooms">Bedrooms</label>
                            <input type="number" name="bedrooms" v-model="bedrooms" min="1" max="9" class="form-control"
                                   id="bedrooms"
                                   aria-describedby="bedroomsHelp" placeholder="0">
                            <small id="bedroomsHelp" class="form-text alert-danger"></small>
                        </div>
                        <div class="form-group mr-5">
                            <label for="bathrooms">Bathrooms</label>
                            <input type="number" name="bathrooms" v-model="bathrooms" min="1" max="9"
                                   class="form-control" id="bathrooms"
                                   aria-describedby="bathroomsHelp" placeholder="0">
                            <small id="bathroomsHelp" class="form-text alert-danger"></small>
                        </div>
                        <div class="form-group mr-5">
                            <label for="storeys">Storeys</label>
                            <input type="number" name="storeys" v-model="storeys" min="1" max="9" class="form-control"
                                   id="storeys"
                                   aria-describedby="storeysHelp" placeholder="0">
                            <small id="storeysHelp" class="form-text alert-danger"></small>
                        </div>
                        <div class="form-group mr-5">
                            <label for="garages">Garages</label>
                            <input type="number" name="garages" v-model="garages" min="1" max="9" class="form-control"
                                   id="garages"
                                   aria-describedby="garagesHelp" placeholder="0">
                            <small id="garagesHelp" class="form-text alert-danger"></small>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group mr-5">
                            <label for="priceFrom">Min-price</label>
                            <input type="number" name="priceFrom" v-model="priceFrom" min="100000" max="999999"
                                   class="form-control" id="priceFrom"
                                   aria-describedby="priceFromHelp" placeholder="100000">
                            <small id="priceFromHelp" class="form-text alert-danger"></small>
                        </div>
                        <div class="form-group mr-5">
                            <label for="priceTo">Max-price</label>
                            <input type="number" name="priceTo" v-model="priceTo" min="100000" max="999999"
                                   class="form-control" id="priceTo"
                                   aria-describedby="priceToHelp" placeholder="100000">
                            <small id="priceToHelp" class="form-text alert-danger"></small>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <loading :active.sync="isLoading"></loading>
            <table class="table table-striped">
                <thead>
                <th scope="col">Name</th>
                <th scope="col">Prise</th>
                <th scope="col">Bedrooms</th>
                <th scope="col">Bathrooms</th>
                <th scope="col">Storeys</th>
                <th scope="col">Garages</th>
                </thead>
                <tbody>
                <house-card v-if="houses.length" v-for="house in houses" :house="house" v-bind:key="house.id"></house-card>
                <tr v-if="!houses.length">
                    <td colspan="6" class="text-center">No result for this query</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import Loading from "vue-loading-overlay";
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
    data: function () {
        return {
            houses: [],
            name: '',
            bedrooms: '',
            bathrooms: '',
            storeys: '',
            garages: '',
            priceFrom: '',
            priceTo: '',
            isLoading: false,
        }
    },
    components: {
        Loading
    },
    mounted() {
        this.filterHouses()
    },
    methods: {
        filterHouses: function () {
            this.isLoading = true;
            setTimeout(() => {
                axios({
                    method: 'get',
                    url: 'api/houses/filter',
                    params: {
                        name: this.name,
                        bedrooms: this.bedrooms,
                        bathrooms: this.bathrooms,
                        storeys: this.storeys,
                        garages: this.garages,
                        priceFrom: this.priceFrom,
                        priceTo: this.priceTo,
                    }
                }).then((response) => {
                    if (response.data.errors) {
                        this.errorMessages(response.data.errors)
                    } else {
                        this.houses = response.data
                        this.isLoading = false
                    }
                });

            }, 500)

        },
        errorMessages: function (errors) {
            $.each(errors, function (key, val) {
                let elem = $('#' + key + 'Help')
                $.each(val, function (k, v) {
                    elem.append(`<p>${v}</p>`)
                })
            })
        }
    }
}
</script>
